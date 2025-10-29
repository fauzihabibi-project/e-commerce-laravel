<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Categories;

class AddCategory extends Component
{
    public $name;

    public function saveCategory()
    {
        // Validasi input
        $this->validate([
            'name' => 'required|string|max:100|unique:categories,name',
        ]);

        // Simpan data ke database
        Categories::create([
            'name' => $this->name,
        ]);

        // Notifikasi sukses (pakai SweetAlert atau alert biasa)
        $this->js(<<<JS
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Kategori berhasil ditambahkan.',
                timer: 2000,
                showConfirmButton: false
            })
        JS);

        //  Kembali ke halaman sebelumnya
        return $this->redirectRoute('categories', navigate: true);
    }
    public function render()
    {
        return view('livewire.categories.add-category');
    }
}
