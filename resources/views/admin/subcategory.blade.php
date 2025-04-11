@extends('admin/layout')
@section('page_title', 'SubCategory')
{{-- @section('category_select', 'active') --}}
@section('container')
    <style>
        /* General table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        table thead tr {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            font-weight: bold;
        }

        table th,
        table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table tbody tr td button {
            margin: 0 5px;
        }

        /* Flash message styling */
        .sufee-alert {
            margin: 20px 0;
            padding: 10px;
            border-radius: 4px;
        }

        /* Section styling */
        .content-main {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .content-main h1 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .btn {
            font-size: 14px;
            padding: 8px 12px;
        }

        .table-responsive {
            overflow-x: auto;
            margin-top: 20px;
        }
    </style>


    <!-- Begin Page Content -->


    <section class="content-main" style="margin-right: 80px;">
        <div class="container">
            <!-- Flash message -->
            @if (session()->has('message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <h1>Sub Category</h1>
            <a href="{{ url('admin/manage_subcategory') }}">
                <button type="button" class="btn btn-success">Add SubCategory</button>
            </a>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sub Category Name</th>
                            <th>Sub Category Slug</th>
                            <th>Sub Category Image</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->subcategory_name }}</td>
                                <td>{{ $list->subcategory_slug }}</td>
                                {{-- <td>{{ $list->categoriep_name }}</td> --}}
                                <td>
                                    @if ($list->subcategory_image)
                                        <img src="{{ asset($list->subcategory_image) }}" width="50">
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ url('admin/subcategory/manage_subcategory/') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-success">Edit</button>
                                    </a>
                                    <a href="{{ url('admin/subcategory/delete/') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>

                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/subcategory/status/0') }}/{{ $list->id }}">
                                            <button type="button" class="btn btn-primary">Active</button>
                                        </a>
                                    @elseif($list->status == 0)
                                        <a href="{{ url('admin/subcategory/status/1') }}/{{ $list->id }}">
                                            <button type="button" class="btn btn-warning">Deactive</button>
                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


@endsection
