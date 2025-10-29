
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    {{-- Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0">{{ $product->name }}</h4>
                        <a href="{{ route('products') }}" wire:navigate class="btn btn-secondary btn-sm">
                            <i class="ti ti-arrow-left"></i> Back
                        </a>
                    </div>

                    {{-- Gambar Produk --}}
                    <div class="text-center mb-4">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 class="rounded shadow-sm border" 
                                 alt="Product Image"
                                 width="300">
                        @else
                            <p class="text-muted fst-italic">No image available.</p>
                        @endif
                    </div>

                    {{-- Detail Produk --}}
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold">Category</h6>
                            <p>{{ $product->category->name ?? '-' }}</p>

                            <h6 class="fw-bold mt-3">Price</h6>
                            <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                            <h6 class="fw-bold mt-3">Stock</h6>
                            <p>{{ $product->stock }}</p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="fw-bold">Description</h6>
                            <p>{{ $product->description ?: '-' }}</p>
                        </div>
                    </div>

                    {{-- Tombol Edit --}}
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('product.edit', $product->id) }}" wire:navigate class="btn btn-primary">
                            <i class="ti ti-edit"></i> Edit Product
                        </a>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('product.edit', $product->id) }}" wire:navigate class="btn btn-primary">
                            <i class="ti ti-edit"></i> Edit Product
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
