<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoiceNumber }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 6px;
        }
    </style>
</head>

<body>
    <h2>Invoice: {{ $invoiceNumber }}</h2>
    <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Contact:</strong> {{ $order->contact }}</p>
    <p><strong>Billing Address:</strong> {{ $order->billing_address }}, {{ $order->city }}, {{ $order->region }},
        {{ $order->zip }}, {{ $order->country }}</p>
    <p><strong>Shipping Address:</strong> {{ $order->shipping_state }}, {{ $order->shipping_zip }},
        {{ $order->shipping_country }}</p>

    <h4>Items</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>₹{{ number_format($item->price, 2) }}</td>
                    <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Grand Total: ₹{{ number_format($order->total, 2) }}</h3>
</body>

</html>
