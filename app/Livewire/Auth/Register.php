<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public $name, $email, $phone, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'     => ['required', 'string', 'max:15', 'unique:users'],
            'password'  => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'password'  => bcrypt($this->password),
            'status'    => 'inactive',
        ]);

        auth()->login($user);

        // KIRIM EMAIL VERIFIKASI
        $user->sendEmailVerificationNotification();

        $this->reset();

        $this->js(<<<JS
            Swal.fire({
                icon : 'success',
                title : 'Berhasil',
                text : 'Akun Anda telah terdaftar, silakan login.',
                showCancelButton : false,
                timer : 3000,
            })
        JS);

        return $this->redirect(route('verification.notice'), navigate: true);
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
