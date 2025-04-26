@extends('admin/layout')
@section('page_title', 'Customer')
@section('container')

    <div
        style="max-width: 600px; margin: 30px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; font-size: 28px; margin-bottom: 20px;">Update Company Logo</h1>

        @if (session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('updatecompanylogo') }}" method="POST" enctype="multipart/form-data"
            style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            @if ($logo && $logo->logo)
                <div style="text-align: center;">
                    <img src="{{ asset($logo->logo) }}" alt="Company Logo"
                        style="max-width: 200px; height: auto; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                </div>
            @endif

            <div>
                <label for="logo" style="display: block; font-weight: bold; margin-bottom: 8px;">Choose New Logo</label>
                <input type="file" name="logo" id="logo"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="text-align: center;">
                <button type="submit"
                    style="background-color: #007bff; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                    Update Logo
                </button>
            </div>
        </form>
    </div>

@endsection
