@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Cek SSL')
@section('content')
    <!-- Tampilan informasi masa berakhir SSL disini -->
    <p>Days until SSL certificate expiration: {{ $daysUntilExpiration }}</p>
@endsection
