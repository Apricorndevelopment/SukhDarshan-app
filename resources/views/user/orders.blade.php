@extends('user.layout')
@section('page_title', 'My Orders')
@section('container')


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <div class="container mt-5">
        <h2 class="mb-4"><i class="bi bi-bag-check"></i> My Orders</h2>

        @forelse($orders as $order)
            <div class="card mb-4 shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <strong><i class="bi bi-receipt-cutoff"></i> Order #{{ $order->id }}</strong> |
                    {{ $order->created_at->format('d M Y') }} |
                    <strong>Total:</strong> ₹{{ number_format($order->total, 2) }}
                </div>

                <div class="card-body bg-light">
                    <p><i class="bi bi-credit-card-2-front"></i> <strong>Payment Method:</strong>
                        {{ ucfirst($order->payment_method) }}</p>
                    <p><i class="bi bi-geo-alt"></i> <strong>Shipping Address:</strong> {{ $order->billing_address }},
                        {{ $order->city }},
                        {{ $order->country }}</p>

                    <h5 class="mt-4"><i class="bi bi-box-seam"></i> Items:</h5>
                    <ul class="list-group">
                        @foreach ($order->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->product->name ?? 'Product Deleted' }}</strong><br>
                                    <small>Quantity: {{ $item->quantity }}</small><br>
                                    <small>Status: <span
                                            class="badge bg-success">{{ ucfirst($item->status) }}</span></small>
                                </div>
                                <span class="text-primary fw-bold">₹{{ number_format($item->price, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> You have no orders yet.
            </div>
        @endforelse
    </div>

@endsection


{{-- @extends('user.layout')
@section('page_title', 'My Orders')
@section('container')

    <div class="container mt-5">
        <h2>My Orders</h2>

        @forelse($orders as $order)
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Order #{{ $order->id }}</strong> |
                    {{ $order->created_at->format('d M Y') }} |
                    <strong>Total:</strong> ₹{{ $order->total }}
                </div>

                <div class="card-body">
                    <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                    <p><strong>Shipping Address:</strong> {{ $order->billing_address }}, {{ $order->city }},
                        {{ $order->country }}</p>

                    <h5>Items:</h5>
                    <ul class="list-group">
                        @foreach ($order->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->product->name ?? 'Product Deleted' }}</strong><br>
                                    Quantity: {{ $item->quantity }}<br>
                                    Status: {{ ucfirst($item->status) }}
                                </div>
                                <span>₹{{ $item->price }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @empty
            <p>You have no orders yet.</p>
        @endforelse
    </div>

@endsection --}}
