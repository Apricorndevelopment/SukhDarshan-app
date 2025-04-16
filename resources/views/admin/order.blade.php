@extends('admin/layout')
@section('page_title', 'Manage Orders')
@section('container')

    <div class="container mt-4">
        <h2 class="mb-4">Orders List</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Billing Address</th>
                        <th>City</th>
                        <th>Region</th>
                        <th>ZIP</th>
                        <th>Country</th>
                        <th>Shipping State</th>
                        <th>Shipping ZIP</th>
                        <th>Shipping Country</th>
                        <th>Payment Method</th>
                        <th>Payment ID</th>
                        <th>Total</th>
                        <th>Razorpay Order ID</th>
                        <th>Razorpay Payment ID</th>
                        <th>Razorpay Signature</th>
                        <th>Payment Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->first_name }}</td>
                            <td>{{ $order->last_name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->contact }}</td>
                            <td>{{ $order->billing_address }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->region }}</td>
                            <td>{{ $order->zip }}</td>
                            <td>{{ $order->country }}</td>
                            <td>{{ $order->shipping_state }}</td>
                            <td>{{ $order->shipping_zip }}</td>
                            <td>{{ $order->shipping_country }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->payment_id }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->razorpay_order_id }}</td>
                            <td>{{ $order->razorpay_payment_id }}</td>
                            <td>{{ $order->razorpay_signature }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
