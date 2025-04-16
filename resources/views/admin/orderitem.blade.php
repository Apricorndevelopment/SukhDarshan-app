@extends('admin/layout')
@section('page_title', 'Manage Order Items')
@section('container')

    <div class="container mt-4">
        <h2 class="mb-4">Order Items</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                @php
                                    $statusLabels = [
                                        0 => 'Cancelled',
                                        1 => 'Accepted',
                                        2 => 'Pending',
                                    ];
                                @endphp
                                <form method="POST" action="{{ route('admin.updateOrderItemStatus', $item->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="form-control">
                                        @foreach ($statusLabels as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ $item->status == $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <!-- Optional action like view/delete -->
                                <form action="{{ route('admin.deleteOrderItem', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this order item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
