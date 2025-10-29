<?php

namespace App\Livewire\Products;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Products;
use App\Models\Categories;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name, $price, $description, $stock, $category_id, $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ];

    public function saveProduct()
    {
        $this->validate();

        // Ubah nama produk jadi slug agar aman untuk nama file (contoh: "acer-predator")
        $slug = Str::slug($this->name);

        // Ambil ekstensi asli gambar (jpg, png, dll)
        $extension = $this->image->getClientOriginalExtension();

        // Buat nama file unik (misal: acer-predator-6747b39f7a1b1.jpg)
        $filename = $slug . '-' . uniqid() . '.' . $extension;

        // Simpan file ke folder storage/app/public/product
        $imagePath = $this->image->storeAs('product', $filename, 'public');

        // Simpan ke database
        Products::create([
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'stock' => $this->stock,
            'category_id' => $this->category_id,
            'image' => $imagePath, // hasil: product/acer-predator-xxxxxx.jpg
        ]);

        $this->reset();

        $this->js(<<<JS
        Swal.fire({
            icon: 'success',
            title: 'Product berhasil disimpan!',
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
        return view('livewire.products.add-product', [
            'categories' => $categories
        ]);
    }
}
