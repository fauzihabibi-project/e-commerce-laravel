<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Relasi ke User Satu cart dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Product Satu cart memiliki satu produk
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    // Menghitung total harga item ini di cart
    public function getSubtotalAttribute()
    {
        return $this->product ? $this->product->price * $this->quantity : 0;
    }
}
