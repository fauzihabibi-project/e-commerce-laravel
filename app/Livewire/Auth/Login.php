<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    public $idUser;
    public $password;
    public $remember = false;

    protected $rules = [
        'idUser'   => 'required|string',
        'password' => 'required|string|min:5',
    ];

    public function login()
    {
        $this->validate();

        // Cari user berdasarkan email atau username
        $user = User::where('email', $this->idUser)
            ->orWhere('name', $this->idUser)
            ->first();

        if (! $user) {
            $this->addError('idUser', 'Akun tidak ditemukan.');
            return;
        }

        // Cek apakah email sudah diverifikasi
        if (! $user->hasVerifiedEmail()) {
            $this->addError('idUser', 'Silakan verifikasi email Anda terlebih dahulu.');
            return;
        }

        // Cek apakah status aktif
        if ($user->status !== 'active') {
            $this->addError('idUser', 'Akun Anda belum aktif.');
            return;
        }

        // Tentukan kolom login: email atau username
        $loginField = filter_var($this->idUser, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        // Coba login dengan Auth::attempt
        if (Auth::attempt([$loginField => $this->idUser, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        // Password salah
        $this->addError('password', 'Password salah.');
    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}
