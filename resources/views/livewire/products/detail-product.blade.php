<div class="row">
    <div class="col-12 col-lg-10 mx-auto">

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">{{ $product->name }}</h4>
                    <a href="{{ route('products') }}" wire:navigate class="btn btn-secondary btn-sm">
                        <i class="ti ti-arrow-left me-1"></i> Back
                    </a>
                </div>

                <div class="row">

                    {{-- ===================== FOTO PRODUK (KIRI) ===================== --}}
                    <div class="col-md-5 mb-4">

                        @php
                        $images = json_decode($product->image, true) ?? [];
                        $firstImage = $images[0] ?? null;
                        @endphp

                        <!-- Gambar Utama -->
                        <div class="border rounded-4 shadow-sm overflow-hidden mb-3">
                            <img id="mainImage"
                                src="{{ $firstImage ? asset('storage/' . $firstImage) : 'https://via.placeholder.com/600' }}"
                                class="img-fluid"
                                alt="{{ $product->name }}"
                                style="object-fit: cover; width: 100%; height: 400px;">
                        </div>

                        <!-- Thumbnail -->
                        <div class="d-flex gap-3">
                            @foreach ($images as $img)
                            <img src="{{ asset('storage/' . $img) }}"
                                onclick="document.getElementById('mainImage').src=this.src"
                                class="rounded"
                                style="width: 80px; height: 80px; object-fit: cover; cursor: pointer; border: 2px solid #ddd;">
                            @endforeach
                        </div>

                    </div>

                    {{-- ===================== DETAIL PRODUK (KANAN) ===================== --}}
                    <div class="col-md-7">

                        <h6 class="fw-bold text-primary">Category</h6>
                        <p class="text-muted">{{ $product->category->name ?? '-' }}</p>

                        <h6 class="fw-bold text-primary mt-3">Price</h6>
                        <p class="text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                        <h6 class="fw-bold text-primary mt-3">Stock</h6>
                        <p class="text-muted">{{ $product->stock }}</p>

                        <h6 class="fw-bold text-primary mt-3">Description</h6>
                        <p class="text-muted">{{ $product->description ?: '-' }}</p>

                    </div>

                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products') }}" wire:navigate class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left me-1"></i> Kembali
                    </a>

                    <a href="{{ route('product.edit', $product->id) }}" wire:navigate class="btn btn-primary">
                        <i class="ti ti-edit me-1"></i> Edit Product
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>