@extends('layouts.layout')
@section('page_title', 'Cart')
@section('container')

    <div class="ayur-cartpage-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($cartItems as $index => $item)
                                @php
                                    $price = is_numeric($item['price']) ? (float) $item['price'] : 0;
                                    $quantity = is_numeric($item['quantity']) ? (int) $item['quantity'] : 0;
                                    $itemTotal = $price * $quantity;
                                    $total += $itemTotal;
                                @endphp

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    {{-- <td>{{ $item['serial'] }}</td> --}}
                                    <td><img src="{{ asset($item['image']) }}" alt="Product Image" width="60"></td>
                                    <td>{{ $item['variant_name'] }}</td>
                                    <td>Rs{{ $item['price'] }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.update') }}">
                                            @csrf
                                            <input type="number" name="quantities[{{ $item['product_id'] }}]"
                                                value="{{ $item['quantity'] }}" min="1">
                                            <button type="submit">Update</button>
                                        </form>
                                    </td>
                                    <td>Rs{{ $itemTotal }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.remove') }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                            <button type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="cart-total">
                        <h3>Cart Total: Rs{{ $total }}</h3>
                    </div>
                    <a href="{{ route('checkout') }}" class="ayur-btn">Proceed to Checkout</a>
                    {{-- <a href="{{ route('checkout') }}" class="ayur-btn">Proceed to Checkout</a> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
