@extends('layouts/layout')
@section('page_title', 'Shop')
@section('container')
    <div class="ayur-bread-section">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>Product Details</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="index.html">Home</a>
                                </span>
                                <span class=""><a href="shop.html">Shop</a></span>
                                <span class="ayur-active-page">Product-details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ayur-bgcover ayur-shopsin-section">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="ayur-shopsin-img mb-3">
                        <img src="{{ asset($product->product_image) }}" alt="image" class="img-fluid" />
                    </div>
                    <div class="row">
                        @foreach ($product_images as $image)
                            <div class="col-md-3 col-4 mb-2">
                                <div class="additional-product-image">
                                    <img src="{{ asset($image->image_path) }}" alt="Additional Image" class="img-fluid" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h3> <b>{{ $product->product_name }}</b> </h3>
                    <p><strong>SKU:</strong> <span id="sku-display">{{ $product->variants[0]->sku ?? $product->sku }}</span>
                    </p>
                    <div class="ayur-shopsin-details">

                        @if ($product->variants->count())
                            <div class="mb-3">
                                <label><strong>Choose Variant:</strong></label>
                                <select class="form-control variant-selector">
                                    @foreach ($product->variants as $variant)
                                        <option value="{{ $variant->id }}" data-price="{{ $variant->price }}"
                                            data-mrp="{{ $variant->mrp }}" data-sku="{{ $variant->sku }}">
                                            {{ $variant->variant_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif


                        <div class="ayur-tpro-price">
                            <p>
                                <del>Rs <span
                                        id="mrp-display">{{ $product->variants[0]->mrp ?? $product->mrp }}</span></del>
                                Rs<span id="price-display">{{ $product->variants[0]->price ?? $product->price }}</span>
                            </p>
                        </div>

                        <div class="ayur-shopsin-heaing">

                            <div class="ayur-tpro-star">
                                <img src="../assets/images/star-icon.png" alt="star">
                                <img src="../assets/images/star-icon.png" alt="star">
                                <img src="../assets/images/star-icon.png" alt="star">
                                <img src="../assets/images/star-icon.png" alt="star">
                                <img src="../assets/images/star-icon.png" alt="star">
                                <p>(2 Customer Reviews)</p>
                            </div>
                            <p>{{ $product->product_shortdesc }}</p>
                        </div>

                        {{-- Quantity --}}
                        <div class="ayur-shopsin-quantity">
                            <input type="number" class="form-control product-quantity" value="1" min="1"
                                max="10" />
                            <button class="shop-add"><span></span></button>
                            <button class="shop-sub"><span></span></button>
                        </div>

                        {{-- Hidden Variant ID --}}
                        <input type="hidden" id="variant-id" value="{{ $product->variants[0]->id ?? '' }}">

                        {{-- Add to Cart --}}
                        <div class="ayur-shopsin-btn">
                            <a href="javascript:void(0);" class="ayur-btn add-to-cart" data-id="{{ $product->id }}">
                                Add To Cart
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Tab Section --}}
                <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                    <div class="ayur-shopsin-tablist">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Product Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Customer Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab" tabindex="0">
                                <div class="ayur-product-desc">
                                    <p>{{ $product->product_desc }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                                tabindex="0">
                                {{-- Reviews section --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="ayur-bgshape ayur-shopsin">
            <img src="{{ asset('assets/images/bg-shape1.png') }}" alt="img">
        </div>
    </div>


    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
                    // Optionally update cart display
                }
            });
        });
    </script>

@endsection
