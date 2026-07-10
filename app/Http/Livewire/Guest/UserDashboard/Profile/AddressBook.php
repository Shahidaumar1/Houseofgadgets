<?php

namespace App\Http\Livewire\Guest\UserDashboard\Profile;

use App\Models\UserAddress;
use Livewire\Component;

class AddressBook extends Component
{
    public $user;
    public $addresses;
    public $selectedAddress;
    public $editMode = false;
    public $addNew = false;
    public $confirmingAddressDeletion = false;

    protected $rules = [
        'selectedAddress.first_name' => 'required',
        'selectedAddress.last_name' => 'nullable',
        'selectedAddress.email' => 'required|email',
        'selectedAddress.phone_number' => 'required',
        'selectedAddress.address_line_1' => 'required',
        'selectedAddress.town_city' => 'required',
        'selectedAddress.post_code' => 'required',
        'selectedAddress.label' => 'required',
    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->addresses = $this->user->addresses;
        $this->selectedAddress = new UserAddress();
    }

    public function deleteAddressConfirmation($addressId)
    {
        $this->confirmingAddressDeletion = $addressId;

        // $this->emit('showBM', 'confirmDeleteModal');
    }

    public function selectAddress(UserAddress $address)
    {
        $this->selectedAddress = $address;
        $this->editMode = true;
    }

    public function saveAddress()
    {
        $this->validate();

        if ($this->editMode) {
            $this->selectedAddress->save();
        } else {
            $this->user->addresses()->create($this->selectedAddress->toArray());
        }

        $this->resetForm();
        $this->addresses = $this->user->addresses;
    }

    public function deleteAddress(UserAddress $address)
    {
        $address->delete();
        $this->addresses = $this->user->addresses;
        $this->resetForm();
        $this->confirmingAddressDeletion = false;
    }

    public function setDefaultAddress(UserAddress $address)
    {
        $this->user->addresses()->update(['is_default' => false]);
        $address->update(['is_default' => true]);
        $this->addresses = $this->user->addresses; // Refresh addresses
    }

    public function addNew()
    {
        $this->addNew = true;
    }
    public function resetForm()
    {
        $this->selectedAddress = new UserAddress();
        $this->editMode = false;
        $this->addNew = false;
    }

    public function render()
    {
        return view('livewire.guest.user-dashboard.profile.address-book')
            ->layout('frontend.layouts.user-app');
    }
}
