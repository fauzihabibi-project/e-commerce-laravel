<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Products;

class ListProducts extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Products::with('category')->latest()->get();
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        if ($product->image && file_exists(public_path('storage/' . $product->image))) {
            unlink(public_path('storage/' . $product->image));
        }
        $product->delete();

        // Refresh list
        $this->products = Products::with('category')->latest()->get();
        session()->flash('success', 'Product deleted successfully.');
    }

    public function render()
    {
        return view('livewire.products.list-products');
    }
}
