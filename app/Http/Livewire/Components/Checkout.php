<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\OrderForm;
use App\Models\OrderUser;
use App\Models\Branch;
use App\Helpers\ServiceType;

class Checkout extends Component
{
    public $form_type = 'clinic_form';
    public $data;
    public $form;
    public $order_type = 'Buy';
    public $cartCount;

    public $cartItems;
    public $subtotal;
    public $tax;
    public $orderTotal;

    public $pm = 'stripe';
    public $price;


    public $clinic_name;
    public $name, $address_line_1, $address_line_2, $town_city, $post_code, $mobile_number, $landline_number, $email = "";
    public $branch_selected = false;
    public $success = false;


    protected $listeners = ['BuyDevice', 'bankDetail', 'paypalDetail'];
    public function mount($data = [])
    {
        $this->data = $data;
        $this->cartItems = session('cart', []);
        if (!empty($this->cartItems))
            foreach ($this->cartItems as $item) {
                $this->order_type = $item['service'];
                break;
            }

        if ($this->order_type == 'Sell')
            $this->pm = 'paypal';

        $this->cartCount = count(session('cart', []));
    }

    public function BuyDevice()
    {

        $this->cartItems = session('cart', []);
        switch ($this->form_type) {
            case 'clinic_form':
                $this->form = session()->get('clinic_form');
                break;
            case 'postal_form':
                $this->form = session()->get('postal_form');
                break;
            case 'collection_form':
                $this->form = session()->get('collection_form');
                break;
            case 'fix_form':
                $this->form = session()->get('fixed_form');
                break;
            default:
                # code...
                break;
        }


        $patient = session()->get('patient');
        if ($this->form && $patient) {

            $this->saveOrder($patient);
            $this->emit('emailSent');
            $this->success  = true;
            $this->clearSession();
        } else {
            $this->emit('loading', false);
            return $this->addError('error', 'Please complete above forms before Book Repair');
        }
    }
    public function clearSession()
    {
        $forms_array = ['cart', 'patient', 'clinic_form', 'postal_form', 'collection_form', 'fix_form', 'pre_code_price', 'fix_form_price', 'collection_form_price'];
        foreach ($forms_array as $f) {
            if (session()->has($f)) {
                session()->forget($f);
            }
        }
    }

    public function bankDetail($bank)
    {
        $this->BuyDevice();
    }

    public function paypalDetail($paypal)
    {
        $this->BuyDevice();
    }
    public function saveOrder($order_user)
    {
        // Create a new order
        $order = new Order();
        $order->user_id = Auth::id() ?? null; // Assuming you have authentication and the user is logged in
        $order->total_price = $this->orderTotal; // You need to calculate the total price based on items
        $order->tax = $this->tax; // Calculate tax if applicable
        $order->shipping = 0; // Calculate shipping cost if applicable
        $order->order_type = $this->order_type; // Set the order type based on your logic
        $order->tracking_number = $this->generateTrackingNumber(); // Set tracking number if available
        $order->payment_method = $this->pm; // Set the payment method based on your logic
        $order->status = 'pending'; // Set the initial status
        $order->save();
        // Loop through order items and associate them with the order
        foreach ($this->cartItems as $itemData) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $itemData['product_id'];
            $orderItem->modal_id = $itemData['modal_id'];
            $orderItem->quantity = $itemData['quantity'];
            $orderItem->price = $itemData['price'];
            $orderItem->service = $itemData['service'];
            $orderItem->image = $itemData['image'];
            $orderItem->url = $itemData['url'];
            $orderItem->name = $itemData['name'];
            $orderItem->memory_size = $itemData['memory_size'];
            $orderItem->color = $itemData['color'];
            $orderItem->grade = $itemData['grade'];
            $orderItem->network_unlocked = $itemData['network_unlocked'];
            $orderItem->save();
        }

        $orderStatus = new OrderStatus();
        $orderStatus->order_id = $order->id;
        $orderStatus->status = 'pending'; // Set the initial status
        $orderStatus->save();

        $orderForm = new OrderForm();
        $orderForm->order_id = $order->id;
        $orderForm->form_type = $this->form_type;
        if ($this->form_type == 'clinic_form') {
            $orderForm->branch_name = $this->form['name'];
            $orderForm->appointment_date = Carbon::createFromFormat('d-m-Y', $this->form['appointment_date'])->format('Y-m-d');
            $orderForm->appointment_time = $this->form['appointment_time'];
            $orderForm->note = $this->form['repair_note'];
        }
        if ($this->form_type == 'postal_form') {
            $orderForm->branch_name = $this->form['name'];
            $orderForm->address_line_1 = $this->form['address_line_1'];
            $orderForm->address_line_2 = $this->form['address_line_2'];
            $orderForm->city = $this->form['city'];
            $orderForm->post_code = $this->form['code'];
            $orderForm->note = $this->form['repair_note'];
        }
        if ($this->form_type == 'collection_form') {
            $orderForm->address_line_1 = $this->form['address_line_1'];
            $orderForm->address_line_2 = $this->form['address_line_2'];
            $orderForm->appointment_date =  $this->form['repair_date'];
            $orderForm->time_slot = $this->form['repair_slot'];
            $orderForm->city = $this->form['city'];
            $orderForm->post_code = $this->form['post_code'];
            $orderForm->note = $this->form['repair_note'];
        }
        if ($this->form_type == 'fixed_form') {
            $orderForm->address_line_1 = $this->form['address_line_1'];
            $orderForm->address_line_2 = $this->form['address_line_2'];
            $orderForm->appointment_date = $this->form['repair_date'];
            $orderForm->time_slot = $this->form['repair_slot'];
            $orderForm->city = $this->form['city'];
            $orderForm->post_code = $this->form['post_code'];
            $orderForm->note = $this->form['repair_note'];
        }
        // $orderForm->branch_id = null;
        $orderForm->save();

        $orderUser = new OrderUser();
        $orderUser->order_id = $order->id;
        $orderUser->first_name = $order_user['first_name'];
        $orderUser->last_name = $order_user['last_name'];
        $orderUser->email = $order_user['email'];
        $orderUser->phone = $order_user['phone'];
        $orderUser->existing_user = $order_user['existing_patient'];
        $orderUser->business = $order_user['business_repair'];
        $orderUser->company_name = $order_user['company_name'];
        $orderUser->save();

        try {

            $firstBranch = Branch::first();
            $hasBranches = $firstBranch !== null;

            $emails = [$order_user['email'],  $hasBranches ? $firstBranch->email : null];
            foreach ($emails as $email) {
                if ($email)
                    Mail::to($email)->send(new OrderConfirmation($order));
            }
        } catch (\Exception $e) {
            // Handle the exception, log it, or notify yourself
            // For example: Log::error($e->getMessage());

            // $this->emit('loading', false);
            // return $this->addError('error', $e->getMessage());
        }
    }
    protected function generateTrackingNumber()
    {
        // Include hours, minutes, seconds, and milliseconds
        $timestamp = now()->format('YmdHisv');

        // Append a random component for uniqueness
        $random = rand(1000, 9999);

        // Combine all components
        return 'TN' . $timestamp . $random;
    }
    public function updateQuantity($productId, $quantity)
    {
        // Update the quantity for the specific product in the cart
        $cartItems = session('cart', []);
        foreach ($cartItems as &$item) {
            if ($item['id'] == $productId) {
                if ($item['available_quantity'] >= $quantity && $quantity >= 1)
                    $item['quantity'] = $quantity;
                break;
            }
        }

        // Save the updated cart to the session
        session(['cart' => $cartItems]);


        // Trigger Livewire to re-render the component
        // $this->emit('cartUpdated');
    }

    public function removeFromCart($key)
    {
        // Remove the item from the cart array
        unset($this->cartItems[$key]);

        // Update the session with the modified cart array
        session(['cart' => $this->cartItems]);

        $this->emit('cartCount', count(session('cart', [])));
    }
    private function calculateSubtotal($cartItems)
    {
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        return $subtotal;
    }

    private function calculateTax($subtotal)
    {
        // Implement your tax calculation logic here
        // For example, you can apply a fixed tax rate or use a more complex formula
        $taxRate = 0.00; // 0% tax rate
        return $subtotal * $taxRate;
    }
    public function changePm($pm)
    {

        $this->pm = $pm;
        if (session()->has('clinic_name')) {
            $this->clinic_name = session()->get('clinic_name');
            $branch = Branch::where('name', $this->clinic_name)->first();
            $this->branch_selected = true;
        } else {
            $this->branch_selected = false;
            $branch = Branch::first();
        }
        if ($branch) {
            $this->name = $branch->name;
            $this->address_line_1 = $branch->address_line_1;
            $this->address_line_2 = $branch->address_line_2;
            $this->town_city = $branch->town_city;
            $this->post_code = $branch->post_code;
            $this->mobile_number = $branch->mobile_number;
            $this->landline_number = $branch->landline_number;
            $this->email = $branch->email;
        }
        if (session()->has('clinic_name')) {
            $this->clinic_name = session()->get('clinic_name');
            $branch = Branch::where('name', $this->clinic_name)->first();
            $this->branch_selected = true;
        } else {
            $this->branch_selected = false;
            $branch = Branch::first();
        }
        if ($branch) {
            $this->name = $branch->name;
            $this->address_line_1 = $branch->address_line_1;
            $this->address_line_2 = $branch->address_line_2;
            $this->town_city = $branch->town_city;
            $this->post_code = $branch->post_code;
            $this->mobile_number = $branch->mobile_number;
            $this->landline_number = $branch->landline_number;
            $this->email = $branch->email;
        }
    }
    public function render()
    {
        $this->cartItems = session('cart', []);
        // Calculate Subtotal, Tax, and Order Total
        $this->subtotal = $this->calculateSubtotal($this->cartItems);
        $this->tax = $this->calculateTax($this->subtotal); // Adjust this based on your tax calculation logic
        $this->orderTotal = $this->subtotal + $this->tax;
        $this->price = $this->subtotal + $this->tax;

        return view('livewire.components.checkout')->layout('frontend.layouts.app');
    }
}
