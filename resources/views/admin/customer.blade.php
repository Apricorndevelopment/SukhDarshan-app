@extends('admin/layout')
@section('page_title', 'Customer')
@section('container')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .table-responsive {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f8f9fa;
            color: #f1dbdb;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .alert {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #f44336;
        }

        .content-main {
            font-family: 'Arial', sans-serif;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn {
            font-size: 0.9rem;
            font-weight: bold;
        }

        .card-header {
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: #fff;
        }
    </style>



    <!-- Begin Page Content -->


    <!-- <section class="py-5 content-main bg-light"> -->
    <div class="container">
        <!-- Flash message -->
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="text-dark">Custmore</h1>

        </div>

        <!-- <div class="shadow-sm card"> -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->email }}</td>
                                <td>{{ $list->customer_mobile }}</td>
                                {{-- <td>{{ $list->status }}</td> --}}
                                <td>{{ $list->status }}</td>
                                <td>
                                    <div class="gap-2 d-flex">
                                        <a href="{{ url('admin/customer/show/') }}/{{ $list->id }}"
                                            class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i> Show

                                            @if ($list->status == 1)
                                                <a href="{{ url('admin/customer/status/0') }}/{{ $list->id }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-toggle-on"></i> Active
                                                </a>
                                            @elseif($list->status == 0)
                                                <a href="{{ url('admin/customer/status/1') }}/{{ $list->id }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-toggle-off"></i> Deactive
                                                </a>
                                            @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </section>

@endsection
