<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Categories as ModelsCategories;

class Categories extends Component
{
    public function delete($id)
    {
        $category = \App\Models\Categories::find($id);

        if (! $category) {
            $this->js(<<<JS
            Swal.fire({
                icon: 'error',
                title: 'Kategori tidak ditemukan',
                showConfirmButton: false,
                timer: 1500
            });
        JS);
            return;
        }

        $category->delete();

        $this->js(<<<JS
        Swal.fire({
            icon: 'success',
            title: 'Kategori berhasil dihapus',
            showConfirmButton: false,
            timer: 1500
        });
    JS);
    }

    public function render()
    {
        $categories = ModelsCategories::all();
        return view('livewire.categories.categories', [
            'categories' => $categories
        ]);
    }
}
