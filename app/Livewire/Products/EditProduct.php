<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Products;
use App\Models\Categories;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product_id;
    public $name, $price, $description, $stock, $category_id, $image, $oldImage;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ];

    public function mount($id)
    {
        $product = Products::findOrFail($id);

        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->stock = $product->stock;
        $this->category_id = $product->category_id;
        $this->oldImage = $product->image;
    }

    public function updateProduct()
    {
        $this->validate();

        $product = Products::findOrFail($this->product_id);

        $imagePath = $this->oldImage;
        if ($this->image) {
            $imagePath = $this->image->store('product', 'public');
        }

        $product->update([
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'stock' => $this->stock,
            'category_id' => $this->category_id,
            'image' => $imagePath,
        ]);

        $this->js(<<<JS
            Swal.fire({
                icon: 'success',
                title: 'Product berhasil diperbarui!',
                toast: true,
                position: 'top-end',
                timer: 2000,
                showConfirmButton: false
            });
        JS);

        return redirect()->route('products');
    }

    public function render()
    {
        $categories = Categories::all();
        return view('livewire.products.edit-product', [
            'categories' => $categories
        ]);
    }
}
