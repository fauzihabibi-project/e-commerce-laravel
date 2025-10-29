<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">E-COMMERCE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3">
                <li class="nav-item"><a class="nav-link" wire:navigate href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" wire:navigate href="{{ route('shop') }}">shop</a></li>
                <li class="nav-item"><a class="nav-link" href="#">cart</a></li>
                <li class="nav-item"><a class="nav-link" href="#">profile</a></li>
            </ul>
        </div>
    </div>
</nav>