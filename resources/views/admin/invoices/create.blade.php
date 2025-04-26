@extends('admin/layout')
@section('page_title', 'Manage_blog')
@section('container')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


    <div class="container py-4">

        <h2 class="mb-4"><i class="fas fa-file-invoice-dollar"></i> Orders Without Invoices</h2>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th><i class="fas fa-hashtag"></i> Order ID</th>
                        <th><i class="fas fa-user"></i> User</th>
                        <th><i class="fas fa-rupee-sign"></i> Total Amount</th>
                        <th><i class="fas fa-cogs"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ordersWithoutInvoices as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td>₹{{ number_format($order->total, 2) }}</td>
                            <td>
                                <a href="{{ route('admin.invoices.generate', $order->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-file-alt"></i> Generate Invoice
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No orders pending for invoice generation.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

@endsection


{{-- @extends('admin/layout')
@section('page_title', 'Manage_blog')
@section('container')

    <div class="container py-4">
        <h2 class="mb-4">Orders Without Invoices</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-warning">
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Total Amount</th>
                        <th>Generate Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordersWithoutInvoices as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td>₹{{ number_format($order->total, 2) }}</td>
                            <td>
                                <a href="{{ route('admin.invoices.generate', $order->id) }}"
                                    class="btn btn-success btn-sm">Generate Invoice</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection --}}
