@extends('layouts/layout')
@section('page_title', 'Shop')
@section('container')

    <style>
        /* PRODUCT BOX STYLING */
        .ayur-tpro-box {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .ayur-tpro-box:hover {
            transform: translateY(-5px);
        }

        /* PRODUCT IMAGE WRAPPER */
        .ayur-tpro-img {
            width: 100%;
            height: 250px;
            overflow: hidden;
            border-radius: 10px;
            position: relative;
        }

        /* PRODUCT IMAGE */
        .ayur-tpro-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        /* LIKE BUTTON AREA */
        .ayur-tpro-like {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .ayur-tpro-like img {
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        /* PRODUCT TEXT */
        .ayur-tpro-text {
            padding-top: 15px;
            text-align: center;
        }

        .ayur-tpro-text h3 {
            font-size: 16px;
            font-weight: 600;
            height: 45px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .ayur-tpro-text a {
            color: #333;
            text-decoration: none;
        }

        .ayur-tpro-text a:hover {
            color: #5cb85c;
        }

        /* PRODUCT PRICE & RATING */
        .ayur-tpro-price {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .ayur-tpro-price del {
            color: #999;
        }

        .ayur-tpro-price p {
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 0;
        }

        .ayur-tpro-star {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: #f39c12;
        }

        /* PRODUCT BUTTON */
        .ayur-tpro-btn {
            margin-top: 15px;
            text-align: center;
        }

        .ayur-tpro-btn a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #5cb85c;
            color: #fff;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .ayur-tpro-btn a:hover {
            background-color: #4cae4c;
        }
    </style>

    <div class="ayur-bread-section"
        style="background-image: url('{{ asset('assets/images/about12.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center; padding: 170px 0 100px;">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2 style="color: black;">Shop</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="/" style="color: black;">Home</a>
                                </span>
                                <span class="ayur-active-page">Shop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Breadcrumb Section end ----------->
    <!------------- Shop single page Section start ----------->
    <div class="ayur-bgcover ayur-shopsin-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="ayur-shop-sidebar">
                        <div class="ayur-widget ayur-shop-search">
                            <div class="ayur-form-input">
                                <input type="text" class="form-control" placeholder="Search Here...">
                            </div>
                            <button class="ayur-btn">search</button>
                        </div>
                        <div class="ayur-widget ayur-shop-categories">
                            <h3>Categories</h3>
                            <ul>

                                @foreach ($subcategory as $list)
                                    <li>
                                        <a href="{{ route('category.products', ['slug' => $list->subcategory_slug]) }}">

                                            <img src="{{ asset('assets/images/right-arrow.png') }}" alt="arrow">
                                            Top {{ $list->subcategory_name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="ayur-widget ayur-shop-tpro">
                            <h3>Featured Products</h3>
                            <div class="ayur-sidepro-wrap">

                                @foreach ($is_promo as $promo)
                                    <div class="ayur-sidepro-box">
                                        <img src="{{ asset($promo->product_image) }}" alt="image">
                                        <div class="ayur-sidepro-boxtext">
                                            <h4><a href="javascript:void(0)">{{ $promo->product_name }}</a></h4>
                                            <p>{{ $promo->product_shortdesc }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                {{-- @php
                    $currentAction = class_basename(Route::currentRouteAction());
                    [$controller, $method] = explode('@', $currentAction);
                @endphp

                Controller: {{ $controller }} <br> wire:
                Method: {{ $method }} --}}
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="ayur-shopsin-products">
                        <div class="row">

                            @foreach ($data as $product)
                                <div class="col-lg-4 col-md-12 col-sm-6">
                                    <div class="ayur-tpro-box ayur-shoppro-sing">
                                        <div class="ayur-tpro-img">
                                            <img src="{{ asset($product->product_image) }}" alt="img">
                                            <div class="ayur-tpro-sale">
                                                {{-- <p>Sale</p> --}}
                                                <div class="ayur-tpro-like">


                                                    <a href="javascript:void(0)" class="ayur-tpor-click"
                                                        data-product-id="{{ $product->id }}">
                                                        <img src="{{ asset('assets/images/like.svg') }}" class="unlike" />
                                                        <img src="{{ asset('assets/images/like-fill.svg') }}"
                                                            class="like d-none" />
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="ayur-tpro-text">
                                            <h3>
                                                <a
                                                    href="{{ url('/shop/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                            </h3>
                                            <div class="ayur-tpro-price">
                                                {{-- <p><del>Rs{{ $product->mrp }}</del>Rs{{ $product->price }}</p> --}}
                                                @if ($product->firstVariant)
                                                    <div class="ayur-tpro-price">
                                                        <p><del>Rs{{ $product->firstVariant->mrp }}</del>
                                                            Rs{{ $product->firstVariant->price }}</p>
                                                        <div class="ayur-tpro-star">
                                                            <img src="../assets/images/star-icon.png" alt="star">
                                                            <p>4.5/5</p>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="ayur-tpro-price">
                                                        <p>Price not available</p>
                                                    </div>
                                                @endif

                                            </div>

                                            <div class="ayur-tpro-btn">
                                                <a href="{{ route('product.details', ['slug' => $product->product_slug]) }}"
                                                    class="ayur-btn ">
                                                    <span>
                                                        <svg width="20" height="19" viewBox="0 0 20 19"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M0.826087 2.39643e-08C0.606995 2.39643e-08 0.396877 0.0870339 0.241955 0.241955C0.0870339 0.396877 0 0.606995 0 0.826087C0 1.04518 0.0870339 1.2553 0.241955 1.41022C0.396877 1.56514 0.606995 1.65217 0.826087 1.65217H2.29652C2.4166 1.65238 2.53358 1.69029 2.63096 1.76054C2.72834 1.8308 2.8012 1.92986 2.83926 2.04374L5.56287 10.2162C5.6843 10.5797 5.69917 10.9696 5.60665 11.3413L5.38278 12.2393C5.05317 13.5561 6.07835 14.8696 7.43478 14.8696H17.3478C17.5669 14.8696 17.777 14.7825 17.932 14.6276C18.0869 14.4727 18.1739 14.2626 18.1739 14.0435C18.1739 13.8244 18.0869 13.6143 17.932 13.4593C17.777 13.3044 17.5669 13.2174 17.3478 13.2174H7.43478C7.11261 13.2174 6.90609 12.953 6.98457 12.6416L7.15391 11.9659C7.18244 11.8516 7.24833 11.7501 7.34112 11.6775C7.43391 11.6049 7.54828 11.5654 7.66609 11.5652H16.5217C16.6953 11.5654 16.8646 11.511 17.0055 11.4095C17.1463 11.3081 17.2517 11.1649 17.3065 11.0002L19.508 4.39148C19.5494 4.26729 19.5607 4.13505 19.5409 4.00566C19.5211 3.87626 19.4709 3.75342 19.3943 3.64725C19.3178 3.54108 19.2171 3.45463 19.1005 3.39501C18.984 3.33539 18.855 3.30432 18.7241 3.30435H5.415C5.29478 3.30431 5.17762 3.26649 5.08007 3.19622C4.98253 3.12595 4.90954 3.0268 4.87143 2.91278L4.0883 0.565043C4.03349 0.400482 3.92828 0.257348 3.78757 0.15593C3.64686 0.0545128 3.4778 -4.17427e-05 3.30435 2.39643e-08H0.826087ZM6.6087 15.6957C6.17051 15.6957 5.75028 15.8697 5.44043 16.1796C5.13059 16.4894 4.95652 16.9096 4.95652 17.3478C4.95652 17.786 5.13059 18.2062 5.44043 18.5161C5.75028 18.8259 6.17051 19 6.6087 19C7.04688 19 7.46712 18.8259 7.77696 18.5161C8.0868 18.2062 8.26087 17.786 8.26087 17.3478C8.26087 16.9096 8.0868 16.4894 7.77696 16.1796C7.46712 15.8697 7.04688 15.6957 6.6087 15.6957ZM16.5217 15.6957C16.0836 15.6957 15.6633 15.8697 15.3535 16.1796C15.0436 16.4894 14.8696 16.9096 14.8696 17.3478C14.8696 17.786 15.0436 18.2062 15.3535 18.5161C15.6633 18.8259 16.0836 19 16.5217 19C16.9599 19 17.3802 18.8259 17.69 18.5161C17.9998 18.2062 18.1739 17.786 18.1739 17.3478C18.1739 16.9096 17.9998 16.4894 17.69 16.1796C17.3802 15.8697 16.9599 15.6957 16.5217 15.6957Z"
                                                                fill="white" />
                                                        </svg>
                                                    </span>
                                                    {{-- Add to Cart --}}
                                                    View Product Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="d-flex justify-content-end">
                                {{ $data->links('pagination::bootstrap-4') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-trenpro-bgshape ayur-shopsin-bg">
            <img src="assets/images/bg-shape1.png" alt="img">
            <img src="assets/images/bg-leaf1.png" alt="img">
        </div>
    </div>

    <div class="ayur-bgcover ayur-trenproduct-sec ayur-trenproduct-sin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap">
                        <h5>Product</h5>
                        <h3>Trending Product</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($is_trending as $list)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="ayur-tpro-box ayur-trepro-box">
                            <div class="ayur-tpro-img">
                                <img src="{{ asset($list->product_image) }}" alt="img">
                                <div class="ayur-tpro-sale">
                                    <div class="ayur-tpro-like">
                                        <a href="javascript:void(0)" class="ayur-tpor-click"
                                            data-product-id="{{ $list->id }}">
                                            <img src="{{ asset('assets/images/like.svg') }}" class="unlike" />
                                            <img src="{{ asset('assets/images/like-fill.svg') }}" class="like d-none" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="ayur-tpro-text">
                                <h3><a href="shop-single.html">{{ $list->product_name }}</a></h3>
                                <div class="ayur-tpro-price">
                                    {{-- <p><del>{{ $list->mrp }}</del>{{ $list->price }}</p> --}}
                                    @if ($product->firstVariant)
                                        <div class="ayur-tpro-price">
                                            <p><del>Rs{{ $product->firstVariant->mrp }}</del>
                                                Rs{{ $product->firstVariant->price }}</p>
                                            <div class="ayur-tpro-star">
                                                <img src="../assets/images/star-icon.png" alt="star">
                                                <p>4.5/5</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="ayur-tpro-price">
                                            <p>Price not available</p>
                                        </div>
                                    @endif

                                </div>

                                <div class="ayur-tpro-btn">
                                    <a href="{{ route('product.details', ['slug' => $list->product_slug]) }}"
                                        class="ayur-btn ">
                                        <span>
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.826087 2.39643e-08C0.606995 2.39643e-08 0.396877 0.0870339 0.241955 0.241955C0.0870339 0.396877 0 0.606995 0 0.826087C0 1.04518 0.0870339 1.2553 0.241955 1.41022C0.396877 1.56514 0.606995 1.65217 0.826087 1.65217H2.29652C2.4166 1.65238 2.53358 1.69029 2.63096 1.76054C2.72834 1.8308 2.8012 1.92986 2.83926 2.04374L5.56287 10.2162C5.6843 10.5797 5.69917 10.9696 5.60665 11.3413L5.38278 12.2393C5.05317 13.5561 6.07835 14.8696 7.43478 14.8696H17.3478C17.5669 14.8696 17.777 14.7825 17.932 14.6276C18.0869 14.4727 18.1739 14.2626 18.1739 14.0435C18.1739 13.8244 18.0869 13.6143 17.932 13.4593C17.777 13.3044 17.5669 13.2174 17.3478 13.2174H7.43478C7.11261 13.2174 6.90609 12.953 6.98457 12.6416L7.15391 11.9659C7.18244 11.8516 7.24833 11.7501 7.34112 11.6775C7.43391 11.6049 7.54828 11.5654 7.66609 11.5652H16.5217C16.6953 11.5654 16.8646 11.511 17.0055 11.4095C17.1463 11.3081 17.2517 11.1649 17.3065 11.0002L19.508 4.39148C19.5494 4.26729 19.5607 4.13505 19.5409 4.00566C19.5211 3.87626 19.4709 3.75342 19.3943 3.64725C19.3178 3.54108 19.2171 3.45463 19.1005 3.39501C18.984 3.33539 18.855 3.30432 18.7241 3.30435H5.415C5.29478 3.30431 5.17762 3.26649 5.08007 3.19622C4.98253 3.12595 4.90954 3.0268 4.87143 2.91278L4.0883 0.565043C4.03349 0.400482 3.92828 0.257348 3.78757 0.15593C3.64686 0.0545128 3.4778 -4.17427e-05 3.30435 2.39643e-08H0.826087ZM6.6087 15.6957C6.17051 15.6957 5.75028 15.8697 5.44043 16.1796C5.13059 16.4894 4.95652 16.9096 4.95652 17.3478C4.95652 17.786 5.13059 18.2062 5.44043 18.5161C5.75028 18.8259 6.17051 19 6.6087 19C7.04688 19 7.46712 18.8259 7.77696 18.5161C8.0868 18.2062 8.26087 17.786 8.26087 17.3478C8.26087 16.9096 8.0868 16.4894 7.77696 16.1796C7.46712 15.8697 7.04688 15.6957 6.6087 15.6957ZM16.5217 15.6957C16.0836 15.6957 15.6633 15.8697 15.3535 16.1796C15.0436 16.4894 14.8696 16.9096 14.8696 17.3478C14.8696 17.786 15.0436 18.2062 15.3535 18.5161C15.6633 18.8259 16.0836 19 16.5217 19C16.9599 19 17.3802 18.8259 17.69 18.5161C17.9998 18.2062 18.1739 17.786 18.1739 17.3478C18.1739 16.9096 17.9998 16.4894 17.69 16.1796C17.3802 15.8697 16.9599 15.6957 16.5217 15.6957Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        View Product Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $is_trending->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-trenpro-bgshape">
            <img src="assets/images/bg-shape3.png" alt="img" />
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ayur-tpor-click').on('click', function() {
                let button = $(this);
                let productId = button.data('product-id');

                $.ajax({
                    url: "{{ route('wishlist.store') }}",
                    type: "POST",
                    data: {
                        product_id: productId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status === 'added') {
                            // Show filled heart, hide empty one
                            button.find('.unlike').addClass('d-none');
                            button.find('.like').removeClass('d-none');
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $('.add-to-cart').on('click', function() {
            var productId = $(this).data('id');

            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    alert(response.message);
                }
            });
        });
    </script>


@endsection
