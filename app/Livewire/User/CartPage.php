<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;

#[Layout('components.layouts.master')]
class CartPage extends Component
{

    public Collection $cartItems;
    public $total = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        if (Auth::check()) {
            $this->cartItems = Cart::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $this->cartItems = collect(); // kosong tapi tetap Collection
        }

        $this->total = $this->cartItems->sum(fn($item) => $item->subtotal);
    }


    public function increment($cartId)
    {
        $cart = Cart::find($cartId);
        if ($cart) {
            $cart->quantity++;
            $cart->save();
            $this->loadCart();
        }
    }

    public function decrement($cartId)
    {
        $cart = Cart::find($cartId);
        if ($cart && $cart->quantity > 1) {
            $cart->quantity--;
            $cart->save();
            $this->loadCart();
        }
    }

    public function removeItem($cartId)
    {
        Cart::destroy($cartId);
        $this->loadCart();

        $this->js(<<<JS
            Swal.fire({
                icon: 'success',
                title: 'Produk dihapus dari keranjang!',
                toast: true,
                position: 'top-end',
                timer: 2000,
                showConfirmButton: false
            });
        JS);
    }

    public function render()
    {
        return view('livewire.user.cart-page');
    }
}
