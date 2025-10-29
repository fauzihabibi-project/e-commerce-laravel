<div>
    <!-- Product List Section -->
    <section class="container py-5">
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold mb-3">Filter Kategori</h5>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Semua</a>
                    <a href="#" class="list-group-item list-group-item-action">Gaming Laptop</a>
                    <a href="#" class="list-group-item list-group-item-action">Ultrabook</a>
                    <a href="#" class="list-group-item list-group-item-action">Workstation</a>
                    <a href="#" class="list-group-item list-group-item-action">Budget Laptop</a>
                </div>
            </div>

            <!-- Product Content -->
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <form class="d-flex" role="search" style="max-width: 300px;">
                        <input class="form-control me-2" type="search" placeholder="Cari laptop..." aria-label="Search">
                        <button class="btn btn-dark" type="submit">Cari</button>
                    </form>
                </div>

                <!-- Product Grid -->
                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h6 class="fw-bold">{{ $product->name }}</h6>
                                <p class="text-primary mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a wire:navigate href="{{ route('user.product.detail', $product->id) }}" class="btn btn-sm btn-outline-dark w-100">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div> <!-- End Product Content -->
        </div>
    </section>
</div>