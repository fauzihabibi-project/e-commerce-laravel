<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Categories\AddCategory;
use App\Livewire\Categories\Categories;
use App\Livewire\Categories\EditCategory;
use App\Livewire\Products\AddProduct;
use App\Livewire\Products\DetailProduct;
use App\Livewire\Products\EditProduct;
use Illuminate\Support\Facades\Route;
use App\Livewire\Products\ListProducts;
use App\Livewire\User\CartPage;
use App\Livewire\User\DetailProductUser;
use App\Livewire\User\Home;
use App\Livewire\User\ListProductsUser;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');


Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/list-products', ListProducts::class)->name('products');
Route::get('/add/product', AddProduct::class)->name('product.add');
Route::get('/edit/product/{id}', EditProduct::class)->name('product.edit');
Route::get('/detail/product/{id}', DetailProduct::class)->name('product.detail');
Route::get('/categories', Categories::class)->name('categories');
Route::get('/add/category', AddCategory::class)->name('category.add');
Route::get('/edit/categorie/{id}', EditCategory::class)->name('category.edit');

Route::get('/home', Home::class)->name('home');
Route::get('/shop', ListProductsUser::class)->name('shop');
Route::get('user/detail/product/{id}', DetailProductUser::class)->name('user.product.detail');
Route::get('/cart', CartPage::class)->name('cart');