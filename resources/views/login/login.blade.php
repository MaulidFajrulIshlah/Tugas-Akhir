<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PANDAY | Login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <main class="container">
            <form class="container form p-3" action="{{ route('postLogin') }}" method="POST">
                @csrf
                {{-- Pesan Failed --}}
                @if(session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                {{-- Logo --}}
                <div class="logo m-3">
                    <img  src="{{ asset('images/logo.png') }}" class="logo" alt="Logo YARSI">
                </div>
                <div class="form-login box-shadow bg-light rounded-3 mt-4 p-4">
                    {{-- Title --}}
                    <div class="container description">
                        <h3><strong>Masuk</strong></h3>
                        <span>Silahkan masuk dengan akun yang sudah terhubung dengan LDAP !</span>
                    </div>
                    {{-- Input username --}}
                    <div class="input-login mx-3 my-4">
                        <div class="username mt-4 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="username" class="form-control py-2 @error('username') is-invalid @enderror"
                            name="username" id="username" placeholder="Masukkan username...." autofocus required
                            value="{{ old ('username') }}">
                            @error('username')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- Input Password --}}
                        <div class="password">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control py-2 @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Masukkan kata sandi...." required
                            value="{{ old ('password') }}">
                            @error('password')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Button login --}}
                    <button class="w-100 btn btn-lg btn-login mb-3" type="submit">Masuk</button>
                </div>
            </form>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>