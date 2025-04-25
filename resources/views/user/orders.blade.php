@extends('user.layout')
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

@endsection
