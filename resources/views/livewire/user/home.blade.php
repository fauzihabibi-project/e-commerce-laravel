<div>
    <!-- Hero Section -->
    <section class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold">Discover the World's Hidden Wonders</h1>
                <p class="mt-3">Explore the most beautiful and unique destinations around the globe.</p>
                <a href="#" class="btn btn-primary mt-3">Shop</a>
            </div>
            <div class="col-md-5 text-center">
                <div class="bg-secondary" style="height:300px; border-radius:10px;"></div>
            </div>
            <div class="col-md-1 text-center">
                <div class="bg-secondary" style="height:300px; border-radius:10px;"></div>
            </div>
        </div>
    </section>

    <!-- Top Destinations -->
    <section class="py-5 bg-light">
        <div class="row g-3 p-4">
            @foreach($products as $product)
            <div class="col-md-3">
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
    </section>

    <!-- Latest Stories -->
    <section class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Latest Stories</h2>
            <a href="#" class="text-decoration-none">View All</a>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="bg-secondary" style="height:300px; border-radius:10px;"></div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column gap-3">
                    <div class="bg-light p-3 rounded">Story 1 preview...</div>
                    <div class="bg-light p-3 rounded">Story 2 preview...</div>
                    <div class="bg-light p-3 rounded">Story 3 preview...</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trekker's Highlights -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold mb-4">Repair laptop</h2>
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <div class="bg-secondary" style="height:250px; border-radius:10px;"></div>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold">want to repair your laptop?</h5>
                    <p>Please contact the admin via WhatsApp</p>
                    <a href="#" class="btn btn-outline-dark">chat now</a>
                </div>
            </div>
        </div>
    </section>
</div>