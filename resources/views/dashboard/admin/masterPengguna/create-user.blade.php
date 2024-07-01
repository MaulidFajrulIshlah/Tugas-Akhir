@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Create Many User')
@section('content')
<h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Create Many User</h5>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('masterUser') }}">Master Data</a></li>
            <li class="breadcrumb-item active">Create Many User</li>

</ol>

    <div class="container">
        <h1 class="text-center">Create Users</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('create.user') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="file">Upload Excel File:</label>
                <input type="file" name="file" id="file" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-success">Create Users</button>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 4px;
            text-align: center;
        }
    </style>
@endsection
