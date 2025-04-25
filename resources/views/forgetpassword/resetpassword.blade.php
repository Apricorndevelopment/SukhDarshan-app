@extends('layouts/layout')
@section('page_tile', 'Reset Password')
@section('container')

    <style>
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .reset-form {
            width: 100%;
            max-width: 400px;
            background: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .reset-form input[type="email"],
        .reset-form input[type="password"] {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .reset-form button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .reset-form button:hover {
            background: #0056b3;
        }
    </style>

    <div class="centered-form">
        <form method="POST" action="{{ route('forgetpassword.submitresetpassword') }}" class="reset-form">
            @csrf

            <input type="hidden" name="token" value="{{ $token ?? '' }}">

            <h2 class="text-center mb-4">Reset Password</h2>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email">

            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="password" name="password" required placeholder="New Password">
            <input type="password" name="password_confirmation" required placeholder="Confirm Password">

            <button type="submit">Reset Password</button>
        </form>
    </div>

@endsection
