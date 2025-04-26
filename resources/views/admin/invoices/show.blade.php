@extends('admin/layout')
@section('page_title', 'Manage Blog')
@section('container')
    <div class="container mt-4">
        <div class="card shadow-lg p-4 rounded">
            <div class="mb-4">
                <h2 class="mb-0">Invoice #{{ $invoice->invoice_number }}</h2>
            </div>

            <div class="mb-3" style="margin-left: ">
                <h4>Customer Details</h4>
                <p><strong>Name:</strong> {{ $invoice->order->first_name }} {{ $invoice->order->last_name }}</p>
                <p><strong>Contact:</strong> {{ $invoice->order->contact }}</p>
                <p><strong>Billing Address:</strong><br>
                    {{ $invoice->order->billing_address }},<br>
                    {{ $invoice->order->city }}, {{ $invoice->order->region }},<br>
                    {{ $invoice->order->zip }}, {{ $invoice->order->country }}
                </p>
                <p><strong>Shipping Address:</strong><br>
                    {{ $invoice->order->shipping_state }},<br>
                    {{ $invoice->order->shipping_zip }}, {{ $invoice->order->shipping_country }}
                </p>
            </div>

            <hr>

            <h4>Order Items</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price (₹)</th>
                            <th>Subtotal (₹)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->order->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>₹{{ number_format($item->price, 2) }}</td>
                                <td>₹{{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end">
                <h3 class="mt-4">Total: ₹{{ number_format($invoice->total, 2) }}</h3>
            </div>

            <div class="text-end mt-3">
                <a href="{{ route('admin.invoices.download', $invoice->id) }}" class="btn btn-success">
                    <i class="bi bi-download"></i> Download PDF
                </a>
            </div>
        </div>
    </div>
@endsection
