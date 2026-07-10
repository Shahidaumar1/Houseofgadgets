<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalController extends Controller
{
    protected $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'),
                env('PAYPAL_SECRET')
            )
        );

        $this->apiContext->setConfig([
            'mode' => env('PAYPAL_MODE'),
        ]);
    }

    public function paymentSuccess(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);

            if ($result->getState() == 'approved') {
                // Update order status to Paid
                $this->updateOrderStatus($paymentId, 'Paid');
                // Send confirmation email
                $this->sendConfirmationEmail($paymentId);

                // Emit event to Livewire component to clear session and stop loading
                $this->emitTo('payment-methods.paypal', 'paymentSuccess');

                return redirect()->route('home')->with('success', 'Payment successful.');
            }

            return redirect()->route('home')->with('error', 'Payment not approved.');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    public function paymentCancel()
    {
        return redirect()->route('home')->with('error', 'Payment cancelled.');
    }

    private function updateOrderStatus($paymentId, $status)
    {
        // Implement order status update logic here
    }

    private function sendConfirmationEmail($paymentId)
    {
        // Implement email sending logic here
    }
}
