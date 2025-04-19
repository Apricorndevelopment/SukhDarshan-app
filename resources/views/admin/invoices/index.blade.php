@extends('admin/layout')
@section('page_title', 'Category')
@section('container')
    <style>
        .content-wrapper {
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            width: 100%;
            overflow-x: auto;
        }

        .top-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            white-space: nowrap;
        }

        .img-thumbnail {
            max-height: 50px;
        }

        .navbar-search {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .dropdown-toggle::after {
            margin-left: 8px;
        }

        @media (max-width: 768px) {
            .table thead {
                display: none;
            }

            .table tbody td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table tbody td::before {
                content: attr(data-label);
                font-weight: bold;
                width: 50%;
            }
        }
    </style>

    <div class="container mt-4">
        {{-- <h2 class="mb-4">Order Items</h2> --}}
        <div class="top-header">
            <h1 class="h4 mb-0">All Invoices </h1>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Invoice #</th>
                    <th>Order ID</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->order_id }}</td>
                        <td><a href="{{ route('admin.invoices.download', $invoice->id) }}"
                                class="btn btn-sm btn-primary">Download
                                PDF</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
