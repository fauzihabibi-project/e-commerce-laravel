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
            'phone'  => ['required', 'string', 'max:15', 'unique:users'],
            'password'  => ['required', 'string', 'min:5', 'confirmed'],
            'password_confirmation'  => ['required', 'string', 'min:5', 'same:password'],
        ]);

        User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'phone'  => $this->phone,
            'password'  => bcrypt($this->password), // cara yang lain selain menggunakan Hash::make()...
        ]);

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

        return $this->redirect(route('login'), navigate: true);
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
