@extends('layouts.layout')
@section('page_title', 'Wishlist')
@section('container')

    <div class="ayur-bread-section">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>Wishlist</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="/">Home</a>
                                </span>
                                <span class="ayur-active-page">Wishlist</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ayur-bgcover ayur-cartpage-wrapper ayur-wishlistpage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-cart-table ayur-wishlist-table table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Option</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($wishlistItems as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($item->product->product_image) }}" width="80"></td>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>${{ $item->product->price }}</td>
                                        <td>

                                            <a href="{{ route('wishlist.addtocart', $item->id) }}" class="ayur-btn">Add To
                                                Cart</a>
                                        </td>
                                        <td>

                                            <a href="{{ route('wishlist.remove', $item->id) }}" class="ayur-tab-delete"><img
                                                    src="assets/images/delete.png" alt="delete"></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No items in wishlist</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
