<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Products;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.master')]
class Home extends Component
{
    public function render()
    {
        $products = Products::all();
        return view('livewire.user.home', [
            'products' => $products
        ]);
    }
}
