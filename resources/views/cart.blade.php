@extends('layouts/layout')
@section('page_title', 'Cart')
@section('container')

    <div class="ayur-bread-section">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ayur-bread-content">
                            <h2>Cart</h2>
                            <div class="ayur-bread-list">
                                <span><a href="{{ url('/') }}">Home</a></span>
                                <span class="ayur-active-page">Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ayur-bgcover ayur-cartpage-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ayur-cart-table table-responsive">
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
                                @php
                                    $subtotal = 0;
                                @endphp
                                @foreach ($cartItems as $index => $item)
                                    @php
                                        $total = $item->product->mrp * 1; // 1 is quantity (adjust later)
                                        $subtotal += $total;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ asset($item->product->product_image) }}" width="95"
                                                alt="image"></td>
                                        <td>
                                            <h2>{{ $item->product->product_name }}</h2>
                                        </td>
                                        <td>${{ $item->product->mrp }}</td>
                                        <td><input type="number" value="1" min="1" /></td>
                                        <td>${{ $total }}</td>
                                        <td>
                                            <a href="{{ route('cart.remove', $item->id) }}" class="ayur-tab-delete">
                                                <img src="{{ asset('assets/images/delete.png') }}" alt="delete">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($cartItems->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="3">
                                        <div class="ayur-coupon-code">
                                            <form class="form-inline">
                                                <div class="ayur-form-input">
                                                    <input type="text" class="form-control" placeholder="Coupon Code"
                                                        name="coupon_code">
                                                    <button type="submit" class="ayur-btn" name="apply_coupon"
                                                        value="Apply Coupon">Apply Coupon</button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td colspan="4" class="ayur-updatecart-btn">
                                        <button class="ayur-btn">Update Cart</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ayur-carttotal-wrapper">
                        <div class="ayur-cart-total">
                            <h2>Cart Totals</h2>
                            <table class="table table-bordere">
                                <tbody>
                                    <tr class="ayur-cartsubtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">${{ $subtotal }}</span></td>
                                    </tr>
                                    <tr class="ayur-ordertotal">
                                        <th>Total</th>
                                        <td><span class="amount">${{ $subtotal }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="ayur-checkout-btn">
                                <a href="{{ route('checkout') }}" class="ayur-btn">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
