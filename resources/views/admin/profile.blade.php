@extends('admin/layout')
@section('page_title', 'Admin Profile')
@section('container')

    <div class="container mt-4">
        <h2>Admin Profile</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" class="form-control" value="{{ $admin->email }}" disabled>
            </div>

            <div class="mb-3">
                <label>Current Profile Image</label><br>
                @if ($admin->profile_image)
                    <img src="{{ asset('storage/' . $admin->profile_image) }}" width="100" class="rounded">
                @else
                    <p>No profile image</p>
                @endif
            </div>

            <div class="mb-3">
                <label>Change Profile Image</label>
                <input type="file" name="profile_image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

@endsection
