<!DOCTYPE html>
<html>

<head>
    <title>Invoice PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #333;
            margin: 0;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .logo {
            width: 150px;
        }

        .invoice-title {
            text-align: right;
        }

        h2,
        h4 {
            margin: 0 0 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .summary {
            margin-top: 30px;
        }

        .summary h3 {
            text-align: right;
        }

        .info-block {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="header">
        <!-- Logo (replace with your logo path) -->
        <div>
            <img src="{{ asset('/adminassets/images/SDP LOGO.png') }}" alt="Logo" class="logo">
        </div>
        <div class="invoice-title">
            <h2>Invoice #{{ $invoice->invoice_number }}</h2>
            <p><strong>Date:</strong> {{ $invoice->created_at->format('d-m-Y') }}</p>
        </div>
    </div>

    <div class="info-block">
        <h4>Customer Info</h4>
        <p><strong>Name:</strong> {{ $invoice->order->first_name }} {{ $invoice->order->last_name }}</p>
        <p><strong>Contact:</strong> {{ $invoice->order->contact }}</p>
        <p><strong>Billing Address:</strong> {{ $invoice->order->billing_address }}, {{ $invoice->order->city }},
            {{ $invoice->order->region }}, {{ $invoice->order->zip }}, {{ $invoice->order->country }}</p>
        <p><strong>Shipping:</strong> {{ $invoice->order->shipping_state }}, {{ $invoice->order->shipping_zip }},
            {{ $invoice->order->shipping_country }}</p>
    </div>

    <div class="info-block">
        <h4>Order Summary</h4>
        <table>
            <thead>
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
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="summary">
        <h3>Total Amount: ₹{{ number_format($invoice->total, 2) }}</h3>
    </div>

</body>

</html>
