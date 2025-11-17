<h2>Silakan Verifikasi Email Anda</h2>
<p>Kami telah mengirim link verifikasi ke email Anda.</p>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Kirim Ulang Email Verifikasi</button>
</form>
