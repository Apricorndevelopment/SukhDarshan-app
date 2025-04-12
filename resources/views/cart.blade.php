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
                            @foreach ($cartItems as $index => $cartItem)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><img src="{{ asset($cartItem->product->product_image) }}" alt="Product Image"></td>
                                    <td>{{ $cartItem->product->product_name }}</td>
                                    <td>Rs{{ $cartItem->product->price }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.update') }}">
                                            @csrf
                                            <input type="number" name="quantities[{{ $cartItem->id }}]"
                                                value="{{ $cartItem->quantity }}" min="1">
                                            <button type="submit">Update</button>
                                        </form>
                                    </td>
                                    <td>Rs{{ $cartItem->product->price * $cartItem->quantity }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.remove') }}">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{ $cartItem->id }}">
                                            <button type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="cart-total">
                        <h3>Cart Total: Rs
                            @php
                                $total = $cartItems->sum(function ($item) {
                                    return $item->product->price * $item->quantity;
                                });
                            @endphp
                            {{ $total }}
                        </h3>
                    </div>

                    <a href="{{ route('checkout') }}" class="ayur-btn">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>

@endsection
