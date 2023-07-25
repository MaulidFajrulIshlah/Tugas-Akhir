
Akun Anda Telah Diproses oleh Admin dengan Sukses!

<body>
    <form action="{{ route('prosesUpdate') }}" method="POST">
        @csrf
        <p>Halo {{ session('username') }}</p>
        <p>Selamat datang di aplikasi kami! Kami senang memberitahu Anda bahwa Anda telah berhasil login untuk pertama kalinya.<p>
        <p>Kami ingin memberitahukan bahwa akun Anda telah berhasil diproses oleh tim admin kami. </p>
        <p>Kami berharap Anda menemukan pengalaman yang menyenangkan dan bermanfaat pada saat menggunakan aplikasi kami.</p>
        <p>Silahkan klik link di bawah ini untuk login kembali</p>
        <p><a href="" class="tombol-login">Login</a></p>
        <p>Terima kasih telah bergabung dengan kami!</p>
    </form>
</body>

</html>

