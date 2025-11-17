<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Orders;
use App\Models\Categories;
use App\Models\Transactions;

class Dashboard extends Component
{
    public $laporanPenjualan;
    public $kategoriTerjual;
    public $totalPemasukan;

    public function mount()
    {
        // Laporan penjualan bulanan
        $this->laporanPenjualan = Orders::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        // Kategori yang terjual
        $this->kategoriTerjual = Categories::select('categories.name')
            ->selectRaw('COUNT(order_items.id) as total')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->join('order_items', 'order_items.product_id', '=', 'products.id')
            ->groupBy('categories.id', 'categories.name')
            ->pluck('total', 'name');

        // Total pemasukan (yang berstatus sukses)
        $this->totalPemasukan = Transactions::where('status', 'Berhasil')
            ->sum('total_amount');
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
