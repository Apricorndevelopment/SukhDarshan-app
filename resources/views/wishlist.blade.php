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
                                    @if ($item->product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($item->product->product_image) }}" width="80"></td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>
                                                @if ($item->product->firstVariant)
                                                    <span
                                                        class="text-muted"><del>₹{{ $item->product->firstVariant->mrp }}</del></span><br>
                                                    ₹{{ $item->product->firstVariant->price }}
                                                @else
                                                    ₹{{ $item->product->price }}
                                                @endif
                                            </td>
                                            {{-- <td>${{ $item->product->price }}</td> --}}
                                            <td>

                                                <a href="javascript:void(0);" class="ayur-btn add-to-cart"
                                                    data-id="{{ $item->id }}">
                                                    Add To Cart
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('wishlist.remove', $item->id) }}"
                                                    class="ayur-tab-delete"><img src="assets/images/delete.png"
                                                        alt="delete"></a>
                                            </td>
                                        </tr>
                                    @endif
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $('.variant-selector').on('change', function() {
            let selected = $(this).find('option:selected');
            $('#price-display').text(selected.data('price'));
            $('#mrp-display').text(selected.data('mrp'));
            $('#sku-display').text(selected.data('sku'));
            $('#variant-id').val(selected.val());
        });

        $('.add-to-cart').on('click', function() {
            var productId = $(this).data('id');
            var quantity = $('.product-quantity').val();
            var variantId = $('#variant-id').val();

            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity,
                    variant_id: variantId
                },
                success: function(response) {
                    alert(response.message);

                }
            });
        });
    </script> --}}
    <script>
        $('.add-to-cart').on('click', function() {
            var wishlistId = $(this).data('id');
            var quantity = 1; // default to 1 or get from a field
            var variantId = $('#variant-id').val(); // optional

            $.ajax({
                url: "{{ route('wishlist.addtocart') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: wishlistId,
                    quantity: quantity,
                    variant_id: variantId
                },
                success: function(response) {
                    alert(response.message);
                    location.reload(); // reload to reflect changes
                }
            });
        });
    </script>
@endsection
