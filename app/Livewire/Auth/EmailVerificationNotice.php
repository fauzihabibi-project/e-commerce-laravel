<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class EmailVerificationNotice extends Component
{
    public function resend()
    {
        $user = auth()->user();

        if (!$user) {
            return;
        }

        // KIRIM ULANG EMAIL VERIFIKASI
        $user->sendEmailVerificationNotification();

        $this->js(<<<JS
            Swal.fire({
                icon: 'success',
                title: 'Email Terkirim!',
                text: 'Link verifikasi sudah dikirim ulang ke email Anda.',
                timer: 3000
            })
        JS);
    }
    public function render()
    {
        return view('livewire.auth.email-verification-notice');
    }
}
