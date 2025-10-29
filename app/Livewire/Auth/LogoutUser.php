<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutUser extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return $this->redirectIntended(route('login'), navigate: true);
    }
    public function render()
    {
        return view('livewire.auth.logout-user');
    }
}
