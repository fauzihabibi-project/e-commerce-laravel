<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <!-- FOTO PREVIEW -->
                    <div class="text-center mb-4">
                        <img src="{{ $foto ? $foto->temporaryUrl() : (Auth::user()->foto
                                ? asset('storage/' . Auth::user()->foto)
                                : 'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=0D6EFD&color=fff&size=150') }}"
                             class="rounded-circle shadow-sm"
                             width="150">
                    </div>

                    <form wire:submit.prevent="updateProfile">

                        <!-- FOTO -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto Profil</label>
                            <input type="file" class="form-control" wire:model="foto">
                            @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" wire:model="email">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- PHONE -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor HP</label>
                            <input type="text" class="form-control" wire:model="phone">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password Baru</label>
                            <input type="password" class="form-control" wire:model="password">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                            <br>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- BUTTON -->
                        <div class="text-end">
                            <a href="{{ route('profile.admin') }}" class="btn btn-secondary px-4">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-primary px-4 ms-2">
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>