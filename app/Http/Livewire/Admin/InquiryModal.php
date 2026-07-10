<?php
namespace App\Http\Livewire\Admin;

use App\Models\CustomerInquiry;
use Livewire\Component;

class InquiryModal extends Component
{
    public $inquiry;
    public $showModal = false;

    protected $listeners = ['viewInquiry' => 'show'];

    public function show($id)
    {
        $this->inquiry = CustomerInquiry::findOrFail($id);
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.admin.inquiry-modal');
    }
}
