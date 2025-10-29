<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Products;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.master')]
class DetailProductUser extends Component
{
    public $product;
    public $relatedProducts;

    public function mount($id)
    {
        $this->product = Products::with('category')->findOrFail($id);

        // Ambil produk serupa berdasarkan kategori
        $this->relatedProducts = Products::where('category_id', $this->product->category_id)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.detail-product-user');
    }
}
