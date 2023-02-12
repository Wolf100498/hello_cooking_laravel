<?php

namespace App\Http\Livewire\Frontend\Orders;

use Livewire\Component;

class OrderIndex extends Component
{




    public function render()
    {
        $user = auth()->user();
        return view('livewire.frontend.orders.order-index');
    }
}
