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
            background: #f8f9fa;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #007bff;
            margin-bottom: 15px;
        }

        .profile-info p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .edit-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            border: none;
            font-size: 16px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            border-radius: 25px;
        }
    </style>

    <!-- You can add FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <div class="container mt-5">
        <h2 class="text-center mb-4"><i class="fas fa-user-circle"></i> User Profile</h2>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success text-center">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
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

            <div class="text-center profile-info">
                <p><i class="fas fa-user"></i> <strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><i class="fas fa-phone"></i> <strong>Phone:</strong> {{ Auth::user()->phone ?? 'Not Set' }}</p>
            </div>
        </div>

        {{-- <div class="text-center mb-4">
            <button id="toggleEdit" class="edit-button"><i class="fas fa-edit"></i> Edit Profile</button>
        </div> --}}

        <form id="editForm" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data"
            style="display: none;" class="profile-container card p-4">
            @csrf
            @method('PUT')

            <div class="mb-3 w-100">
                <label><i class="fas fa-user"></i> Name</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="form-control"
                    required>
            </div>

            <div class="mb-3 w-100">
                <label><i class="fas fa-phone"></i> Phone</label>
                <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="form-control">
            </div>

            <div class="mb-3 w-100">
                <label><i class="fas fa-image"></i> Profile Image</label>
                <input type="file" name="profile_image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Update Profile</button>
        </form>
    </div>

    <script>
        document.getElementById('toggleEdit').addEventListener('click', function() {
            const form = document.getElementById('editForm');
            form.style.display = form.style.display === 'none' ? 'flex' : 'none';
        });
    </script>

@endsection



{{-- @extends('user.layout')
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


        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif


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

@endsection --}}
