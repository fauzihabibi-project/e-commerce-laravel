<div>
    <section class="container py-5">
        <div class="row align-items-start">
            <!-- Gambar Produk -->
            <div class="col-md-5 mb-4">
                <img src="{{ asset('storage/' . $product->image) }}"
                    class="img-fluid rounded shadow-sm"
                    alt="{{ $product->name }}">
            </div>

            <!-- Info Produk -->
            <div class="col-md-7">
                <h2 class="fw-bold">{{ $product->name }}</h2>
                <p class="text-primary fs-4 fw-semibold mb-2">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                <p class="text-muted">
                    {{ $product->stock > 0 ? 'Tersedia' : 'Stok Habis' }} • Garansi Resmi 1 Bulan
                </p>

                <hr>

                <p class="mb-3">
                    {{ $product->description }}
                </p>

                <ul class="list-unstyled mb-4">
                    <li>💻 Kategori: {{ $product->category->name ?? '-' }}</li>
                    <li>💾 Stok: {{ $product->stock }}</li>
                    <li>🗓️ Diperbarui: {{ $product->updated_at->diffForHumans() }}</li>
                </ul>

                <div class="d-flex gap-3">
                    <button class="btn btn-dark px-4">Tambah ke Keranjang</button>
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20membeli%20{{ urlencode($product->name) }}"
                        target="_blank"
                        class="btn btn-success px-4">
                        Beli via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk Terkait -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold">Produk Terkait</h4>
                <a wire:navigate href="{{ route('shop') }}" class="text-decoration-none">Lihat Semua</a>
            </div>

            <div class="row g-4">
                @forelse($relatedProducts as $item)
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('storage/' . $item->image) }}"
                            class="card-img-top"
                            alt="{{ $item->name }}">
                        <div class="card-body text-center">
                            <h6 class="fw-bold">{{ $item->name }}</h6>
                            <p class="text-primary mb-2">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </p>
                            <a wire:navigate
                                href="{{ route('user.product.detail', $item->id) }}"
                                class="btn btn-sm btn-outline-dark w-100">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Tidak ada produk terkait.</p>
                @endforelse
            </div>
        </div>
    </section>
</div>