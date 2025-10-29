<div class="container py-5">
    <div class="row">
        <!-- KIRI: Produk di keranjang -->
        <div class="col-lg-8">
            <h4 class="fw-bold mb-4">Keranjang Belanja</h4>

            @if ($cartItems->isEmpty())
                <div class="alert alert-warning">Keranjang Anda kosong.</div>
            @else
                @foreach ($cartItems as $item)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/' . $item->product->image) }}" width="80" class="rounded me-3" alt="{{ $item->product->name }}">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $item->product->name }}</h6>
                                    <small class="text-muted">{{ $item->product->description }}</small><br>
                                    <small class="text-success fw-semibold">Stok tersedia</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <p class="fw-bold mb-1">Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                                <div class="d-flex align-items-center justify-content-end">
                                    <button wire:click="decrement({{ $item->id }})" class="btn btn-sm btn-outline-secondary">−</button>
                                    <input type="text" readonly value="{{ $item->quantity }}" class="form-control form-control-sm text-center mx-2" style="width: 50px;">
                                    <button wire:click="increment({{ $item->id }})" class="btn btn-sm btn-outline-secondary">+</button>
                                </div>
                                <button wire:click="removeItem({{ $item->id }})" class="btn btn-link text-danger mt-2 small">Hapus</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- KANAN: Ringkasan harga -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h6 class="fw-bold mt-4 mb-3">Rincian Harga</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ $cartItems->count() }} Produk</span>
                        <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Ongkir</span>
                        <span>Rp{{ number_format(50000, 0, ',', '.') }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span class="text-primary">
                            Rp{{ number_format($total + 50000, 0, ',', '.') }}
                        </span>
                    </div>

                    <button class="btn btn-dark w-100 mt-4 py-2 fw-bold">
                        Lanjut ke Pembayaran →
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
