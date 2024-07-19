<?php

namespace App\Livewire;

use App\Models\Address;
use Livewire\Component;

class ShippingAddresses extends Component
{

    public $addresses;

    public function mount()
    {
        $this->addresses = Address::where('user_id', auth()->id())->get();
    }

    public function render()
    {
        return view('livewire.shipping-addresses');
    }
}
