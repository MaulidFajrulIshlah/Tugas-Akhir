@extends('layouts.mainLogin')
@section('title', 'Dashboard | Login')
@section('container')
<main class="container">
    <form class="container form p-3" action="/login" method="POST">
        @csrf
        @if(session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- Logo --}}
        <div class="logo mt-2">
            <img  src="images/logo.png" alt="Logo YARSI" width="325" height="95">
        </div>
        <div class="form-login box-shadow bg-light rounded-3 mt-5 p-4">
            {{-- Title --}}
            <div class="container description">
                <h3>Masuk</h3>
                <span>Silahkan masuk dengan akun yang sudah terhubung dengan LDAP !</span>
            </div>
            {{-- Input username --}}
            <div class="input-login mx-2 pb-3">
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
                <div class="password mb-3">
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
            <button class="w-100 btn btn-lg btn-primary btn-login mb-3" type="submit">Masuk</button>
        </div>
    </form>
</main>
@endsection