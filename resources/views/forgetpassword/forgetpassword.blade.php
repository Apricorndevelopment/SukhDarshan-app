@extends('layouts/layout')
@section('page_tile', 'Forgot Password')
@section('container')

    <style>
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .forgot-form {
            width: 100%;
            max-width: 400px;
            background: #f9f9f9;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="center-form">
        <form method="POST" action="{{ route('forgetpassword.submitforgetpassword') }}" class="forgot-form">
            @csrf
            <h2 class="text-center mb-4">Forgot Password</h2>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
        </form>
    </div>

@endsection
