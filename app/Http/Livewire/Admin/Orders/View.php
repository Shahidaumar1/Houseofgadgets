<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Order;

class View extends Component
{
    public $order;
    public $patient;
    public $repairDetail;
    public $form;

    // public function mount($orderDetails)
    // {
    //     $this->order = Order::findOrFail($orderDetails);
    //     $this->patient      = json_decode($this->order->patient, true) ?? [];
    //     $this->repairDetail = json_decode($this->order->repair_detail, true) ?? [];
    //     $this->form         = json_decode($this->order->form, true) ?? [];
    // }
public function mount($orderDetails)
{
    $this->order = Order::findOrFail($orderDetails);
    $this->patient      = json_decode($this->order->patient, true) ?? [];
    $this->repairDetail = json_decode($this->order->repair_detail, true) ?? [];
    $this->form         = json_decode($this->order->form, true) ?? [];

    // Normalize repairDetail keys
    $rd = $this->repairDetail;
    $this->repairDetail = array_merge([
        'device'            => $rd['device'] ?? $rd['Device'] ?? $rd['phone'] ?? $rd['mobile'] ?? null,
        'model'             => $rd['model'] ?? $rd['Model'] ?? $rd['phone_model'] ?? null,
        'faults'            => $rd['faults'] ?? $rd['Faults'] ?? [],
        'fault'             => $rd['fault'] ?? $rd['Fault'] ?? $rd['issue'] ?? $rd['problem'] ?? null,
        'How_long'          => $rd['How_long'] ?? $rd['turnaround'] ?? $rd['turnaround_time'] ?? null,
        'part_used'         => $rd['part_used'] ?? $rd['part'] ?? $rd['parts'] ?? null,
        'warranty'          => $rd['warranty'] ?? $rd['Warranty'] ?? null,
        'quotePrice'        => $rd['quotePrice'] ?? $rd['quote_price'] ?? $rd['price'] ?? 0,
        'repair_type_name'  => $rd['repair_type_name'] ?? $rd['repair_type'] ?? $rd['service_type'] ?? null,
        'screen_protector'  => $rd['screen_protector'] ?? null,
        'protective_case'   => $rd['protective_case'] ?? null,
        'postal_price'      => $rd['postal_price'] ?? null,
    ], $rd); // keeps original keys too
}
    public function render()
    {
        return view('livewire.admin.orders.view')->layout('layouts.admin');
    }
}