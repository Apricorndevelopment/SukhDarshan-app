@extends('admin/layout')
@section('page_title', 'show customer')
@section('container')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
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
            color: #333;
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


    <section class="py-5 content-main bg-light">


        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="text-dark">Custmore</h1>

        </div>

        <!-- <div class="shadow-sm card"> -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Field</th>
                            <th>value</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Name</b></td>
                            <td>{{ $customer_list->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>E-mail</strong></td>
                            <td>{{ $customer_list->email }}</td>
                        </tr>
                        {{-- <tr>
                            <td><strong>Mobile No.</strong></td>
                            <td>{{ $customer_list->mobile }}</td>
                        </tr> --}}

                        <tr>
                            <td><strong>Status</strong></td>
                            <td>{{ $customer_list->status }}</td>
                        </tr>
                        <tr>
                            <td><strong>Created Date</strong></td>
                            <td>{{ \Carbon\Carbon::parse($customer_list->created_at)->format('d-m-y h:i:s') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Updated Date</strong></td>
                            <td>{{ \Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
    </section>

@endsection
