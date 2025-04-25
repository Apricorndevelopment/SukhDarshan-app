@extends('user.layout')
@section('page_title', 'User Profile')
@section('container')

    <style>
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 500px;
            margin: auto;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }
    </style>

    <div class="container mt-5">
        <h2 class="text-center mb-4">User Profile</h2>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-4 mb-4 profile-container">
            @if (Auth::user()->profile_image)
                <img src="{{ asset(Auth::user()->profile_image) }}" class="profile-img" alt="Profile Image">
            @else
                <img src="{{ asset('default-user.png') }}" class="profile-img" alt="Default Profile Image">
            @endif

            <div class="text-center">
                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Phone:</strong> {{ Auth::user()->phone ?? 'Not Set' }}</p>
            </div>
        </div>

        <div class="text-center mb-3">
            {{-- <button id="toggleEdit" class="btn btn-secondary">Edit Profile</button> --}}
        </div>

        <form id="editForm" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data"
            style="display: none;" class="profile-container card p-4">
            @csrf
            @method('PUT')

            <div class="mb-3 w-100">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="form-control"
                    required>
            </div>

            <div class="mb-3 w-100">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="form-control">
            </div>

            <div class="mb-3 w-100">
                <label>Profile Image</label>
                <input type="file" name="profile_image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

    <script>
        document.getElementById('toggleEdit').addEventListener('click', function() {
            const form = document.getElementById('editForm');
            form.style.display = form.style.display === 'none' ? 'flex' : 'none';
        });
    </script>

@endsection
