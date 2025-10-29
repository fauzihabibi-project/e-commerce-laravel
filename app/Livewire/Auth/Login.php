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

        // Cek apakah user ada berdasarkan email atau username
        $user = User::where('email', $this->idUser)
            ->orWhere('name', $this->idUser)
            ->first();

        if (! $user) {
            $this->addError('idUser', 'Akun tidak ditemukan.');
            return;
        }

        // Tentukan kolom login: email atau username
        $loginField = filter_var($this->idUser, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        // Coba login
        if (Auth::attempt([$loginField => $this->idUser, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            // Cek role untuk arahkan ke dashboard yang sesuai
            if (Auth::attempt([$loginField => $this->idUser, 'password' => $this->password], $this->remember)) {
                session()->regenerate();

                if (Auth::user()->role === 'admin') {
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('home');
                }
            }
        }

        // Jika password salah
        $this->addError('password', 'Password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
