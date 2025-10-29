<?php

namespace App\Livewire\User;

use App\Models\Products;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.master')]
class ListProductsUser extends Component
{
    public function render()
    {
        $products = Products::all();
        return view('livewire.user.list-products-user', [
            'products' => $products
        ]);
    }
}
