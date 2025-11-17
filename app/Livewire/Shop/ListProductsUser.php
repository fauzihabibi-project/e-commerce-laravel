<?php

namespace App\Livewire\Shop;

use App\Models\Products;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.master')]
class ListProductsUser extends Component
{
    public $search = '';

    public function render()
    {
        // Jika pencarian kosong → tampilkan semua produk
        $products = Products::query();

        if (!empty($this->search)) {
            $products->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.shop.list-products-user', [
            'products' => $products->orderBy('id', 'desc')->get(),
        ]);
    }
}
