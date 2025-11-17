<nav class="navbar navbar-expand-lg py-3"
     x-data="{
        theme: localStorage.getItem('theme') || 'light',
        toggle() {
            this.theme = this.theme === 'light' ? 'dark' : 'light';
            localStorage.setItem('theme', this.theme);
            document.documentElement.setAttribute('data-theme', this.theme);
        },
        init() {
            document.documentElement.setAttribute('data-theme', this.theme);
        }
     }"
     x-init="init()">

    <div class="container">
        <a class="navbar-brand fw-bold" href="#">E-COMMERCE</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3">
                <li class="nav-item"><a class="nav-link" wire:navigate href="{{ route('home') }}">HOME</a></li>
                <li class="nav-item"><a class="nav-link" wire:navigate href="{{ route('shop') }}">SHOP</a></li>
                <li class="nav-item"><a class="nav-link" href="#">SERVICES</a></li>
                <li class="nav-item"><a class="nav-link" wire:navigate href="{{ route('cart') }}">CART</a></li>
            </ul>

            <!-- Jika user sudah login  -->
            @if(Auth::check())
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->foto)
                            <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                 alt="{{ Auth::user()->name }}"
                                 class="rounded-circle me-2" width="32" height="32">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                                 alt="{{ Auth::user()->name }}"
                                 class="rounded-circle me-2" width="32" height="32">
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" wire:navigate href="{{ route('profile') }}">
                                <i class="bi bi-person me-2"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" wire:navigate href="{{ route('orders') }}">
                                <i class="bi bi-bag me-2"></i> Orders
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>

                        <livewire:auth.logout-user />
                    </ul>
                </div>

            <!-- Jika user belum login -->
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2" wire:navigate>
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-primary" wire:navigate>
                    Register
                </a>
            @endif

            <!-- Tombol Dark Mode -->
            <button @click="toggle()" class="btn btn-outline-secondary ms-3">
                <span x-show="theme === 'light'">🌙</span>
                <span x-show="theme === 'dark'">☀️</span>
            </button>
        </div>
    </div>
</nav>
