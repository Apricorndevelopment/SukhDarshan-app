@extends('admin/layout')
@section('page_title', 'Manage_Product')
@section('container')

    <style>
        .content-wrapper {
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .img-thumbnail {
            max-height: 50px;
        }
    </style>

    <div class="content-wrapper">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Header and Button -->
        <div class="top-header">
            <h1 class="h4 mb-0">Product</h1>
            <a href="{{ url('admin/manage_product') }}" class="btn btn-success">Add Product</a>
        </div>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th style="width: 280px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->product_name }}</td>
                            <td>{{ $list->product_slug }}</td>
                            <td>
                                @if ($list->product_image)
                                    <img src="{{ asset($list->product_image) }}" class="img-thumbnail">
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/product/manage_product/' . $list->id) }}"
                                    class="btn btn-sm btn-success">Edit</a>

                                @if ($list->status == 1)
                                    <a href="{{ url('admin/product/status/0/' . $list->id) }}"
                                        class="btn btn-sm btn-primary">Active</a>
                                @else
                                    <a href="{{ url('admin/product/status/1/' . $list->id) }}"
                                        class="btn btn-sm btn-warning">Deactive</a>
                                @endif

                                <a href="{{ url('admin/product/delete/' . $list->id) }}"
                                    onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
