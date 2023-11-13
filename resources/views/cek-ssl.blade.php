@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Pengecekan SSL')
@section('content')

<h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Beranda</h5>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pengecekan SSL</li>
</ol>



<div class="row g-3 my-3">


    @if(isset($days_left))
    @if(is_numeric($days_left))
    <p>Sertifikat SSL akan habis dalam <strong>{{$days_left}} </strong>hari.</p>
    @else
    <p>{{$days_left}}</p>
    @endif
    @endif

    <!-- Form untuk input email dan hari pengingat -->
    <form method="post" action="{{ route('ssl.check') }}" onsubmit="">
        @csrf
        <p class="mb-1">Kirim pengingat pembaharuan sertifikat SSL disini:</p>
        <br>
        <p class="mb-1">Email: <input type="email" name="email" required></p>
        <br>
        Ingatkan saya sebelum <input style="width: 40px; margin-bottom: 20px;" type="number" name="reminder_days" value="" required> hari
        <br>
        <button type="submit" class="rounded" style="width: 100px;">Kirim</button>
    </form>


</div> <!-- /row g-3 my-3 -->

@endsection