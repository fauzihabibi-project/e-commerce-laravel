<h2>Halo {{ $name }},</h2>

<p>Terima kasih sudah mendaftar. Klik link berikut untuk verifikasi email Anda:</p>

<p>
    <a href="{{ url('/verify-email/' . $token) }}" 
       style="background:#4CAF50; padding:10px 15px; color:white; text-decoration:none; border-radius:5px;">
        Verifikasi Email
    </a>
</p>

<p>Jika Anda tidak mendaftar, abaikan email ini.</p>
