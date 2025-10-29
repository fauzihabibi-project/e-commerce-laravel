<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Products;

class DetailProduct extends Component
{
    public $product;

    public function mount($id)
    {
        // Ambil produk beserta kategori
        $this->product = Products::with('category')->findOrFail($id);
    }
    
    public function render()
    {
        return view('livewire.products.detail-product');
    }
}
