@extends('layouts/layout')
@section('page_title', 'Welcome To Ayurveda')
@section('container')


    <div class="ayur-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-banner-heading">
                        <h1>We Are Here To Give You The Best <span>Herb Products</span> </h1>
                        <p>True wellness begins with balance and nature provides the path.
                            Through time-tested Ayurvedic practices, mindful living, and natural remedies,
                            you can restore harmony within your body and mind.</p>
                        <a href="shop.html" class="ayur-btn">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ayur-banner-slider-sec">
                        <div class="swiper ayur-banner-slider" swiper_scale_active>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="ayur-ban-slide">
                                        <img src="{{ asset('assets/images/ban-head-Image.png') }}" alt="headerimage">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ayur-ban-slide">
                                        <img src="{{ asset('assets/images/ban-head-Image.png') }}" alt="headerimage">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ayur-ban-slide">
                                        <img src="{{ asset('assets/images/ban-head-Image.png') }}" alt="headerimage">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ayur-ban-slide">
                                        <img src="{{ asset('assets/images/ban-head-Image.png') }}" alt="headerimage">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ayur-ban-slide">
                                        <img src="{{ asset('assets/images/ban-head-Image.png') }}" alt="headerimage">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev">
                                <svg width="46" height="22" viewBox="0 0 46 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.520424 9.74414L0.522022 9.74245L9.79254 0.51664C10.4871 -0.174498 11.6104 -0.171926 12.3017 0.522671C12.9929 1.21718 12.9903 2.34051 12.2958 3.03174L6.07152 9.22581H43.6452C44.6251 9.22581 45.4194 10.0201 45.4194 11C45.4194 11.9799 44.6251 12.7742 43.6452 12.7742H6.07161L12.2957 18.9683C12.9902 19.6595 12.9928 20.7828 12.3016 21.4773C11.6103 22.172 10.4869 22.1744 9.79245 21.4834L0.521931 12.2575L0.520336 12.2559C-0.17453 11.5623 -0.17231 10.4354 0.520424 9.74414Z"
                                        fill="#F6F1ED" />
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg width="46" height="22" viewBox="0 0 46 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M44.899 9.74414L44.8974 9.74245L35.6269 0.51664C34.9324 -0.174498 33.8091 -0.171926 33.1177 0.522671C32.4265 1.21718 32.4292 2.34051 33.1237 3.03174L39.3479 9.22581H1.77419C0.794307 9.22581 0 10.0201 0 11C0 11.9799 0.794307 12.7742 1.77419 12.7742H39.3478L33.1238 18.9683C32.4293 19.6595 32.4266 20.7828 33.1178 21.4773C33.8091 22.172 34.9326 22.1744 35.627 21.4834L44.8975 12.2575L44.8991 12.2559C45.594 11.5623 45.5917 10.4354 44.899 9.74414Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-ban-leaf">
            <img src="assets/images/ban-leafleft.png" alt="leaf-image">
            <img src="assets/images/ban-leafright.png" alt="leaf-image">
        </div>
    </div>

    <div class="ayur-care-slider-wrapper">
        <div class="container-fluid">
            <div class="ayur-care-slider-sec">
                <div class="swiper ayur-care-slider">
                    <div class="swiper-wrapper">

                        @foreach ($subcategory as $list)
                            <div class="swiper-slide">
                                <div class="ayur-careslide-box">
                                    <div class="ayur-careslider-img">
                                        <img src="{{ asset($list->subcategory_image) }}" alt="img"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <h3>{{ $list->subcategory_name }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="swiper-button-prev">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 0C31.0284 0 40 8.97164 40 20C40 31.0284 31.0284 40 20 40C8.97164 40 0 31.0284 0 20C0 8.97164 8.97164 0 20 0ZM13.8216 21.1784L22.155 29.5116C22.3096 29.6666 22.4932 29.7896 22.6955 29.8734C22.8977 29.9572 23.1145 30.0002 23.3334 30C23.5523 30.0002 23.769 29.9572 23.9712 29.8733C24.1735 29.7895 24.3571 29.6666 24.5117 29.5116C25.1634 28.86 25.1634 27.8066 24.5117 27.155L17.3566 20L24.5116 12.845C25.1633 12.1934 25.1633 11.14 24.5116 10.4884C23.86 9.83672 22.8066 9.83672 22.155 10.4884L13.8216 18.8217C13.17 19.4734 13.17 20.5266 13.8216 21.1784Z"
                            fill="#D6CDCA" />
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 0C8.97164 0 0 8.97164 0 20C0 31.0284 8.97164 40 20 40C31.0284 40 40 31.0284 40 20C40 8.97164 31.0284 0 20 0ZM26.1784 21.1784L17.845 29.5116C17.6904 29.6666 17.5068 29.7896 17.3045 29.8734C17.1023 29.9572 16.8855 30.0002 16.6666 30C16.4477 30.0002 16.231 29.9572 16.0288 29.8733C15.8265 29.7895 15.6429 29.6666 15.4883 29.5116C14.8366 28.86 14.8366 27.8066 15.4883 27.155L22.6434 20L15.4884 12.845C14.8367 12.1934 14.8367 11.14 15.4884 10.4884C16.14 9.83672 17.1934 9.83672 17.845 10.4884L26.1784 18.8217C26.83 19.4734 26.83 20.5266 26.1784 21.1784Z"
                            fill="#CD8973" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!------------- Care Section end ----------->
    <!------------- Top Product Section start ----------->
    <div class="ayur-bgcover ayur-topproduct-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap">
                        <h5>Medicine</h5>
                        <h3>Our Top Products</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($is_top as $data)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="ayur-tpro-box">
                            <div class="ayur-tpro-img">
                                <img src="{{ asset($data->product_image) }}" alt="img">
                                <div class="ayur-tpro-sale">
                                    {{-- <p>Sale</p> --}}
                                    <div class="ayur-tpro-like">


                                        <a href="javascript:void(0)" class="ayur-tpor-click"
                                            data-product-id="{{ $data->id }}">
                                            <img src="{{ asset('assets/images/like.svg') }}" class="unlike" />
                                            <img src="{{ asset('assets/images/like-fill.svg') }}" class="like d-none" />
                                        </a>


                                    </div>
                                </div>
                            </div>
                            <div class="ayur-tpro-text">
                                <h3><a href="shop-single.html">{{ $data->product_name }}</a></h3>
                                <div class="ayur-tpro-price">
                                    <p><del>${{ $data->mrp }}</del>${{ $data->price }}</p>
                                    <div class="ayur-tpro-star">
                                        <img src="assets/images/star-icon.png" alt="star">
                                        <p>4.5/5</p>
                                    </div>
                                </div>

                                <div class="ayur-tpro-btn">
                                    <a href="{{ url('/shop/' . $data->product_slug) }}" class="ayur-btn ">
                                        <span>
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
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


            </div>
        </div>
        <div class="ayur-bgshape ayur-tpro-bgshape">
            <img src="assets/images/bg-shape1.png" alt="img" />
            <img src="assets/images/bg-leaf1.png" alt="img" />
        </div>
    </div>
    <!------------- Top Product Section end ----------->
    <!------------- About Section start ----------->
    <div class="ayur-bgcover ayur-about-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-about-img">
                        <img src="{{ asset('assets/images/about-img.png') }}" alt="img" data-tilt
                            data-tilt-max="10" data-tilt-speed="1000" data-tilt-perspective="1000" />
                        <div class="ayur-about-exp">
                            <p>10</p>
                            <p>Years of Experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap ayur-about-head">
                        <h5>Who We Are</h5>
                        <h3>The Natural Way To Achieving Balance And Optimal Health</h3>
                        <p>In today’s fast-paced world, true wellness goes beyond treating symptoms—it’s about nurturing
                            your body, mind, and spirit in harmony with nature. Achieving balance and optimal health
                            naturally means embracing holistic practices that align with your body’s innate ability to heal
                            and thrive.</p>
                        <a href="{{ route('about') }}" class="ayur-btn">Know More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-about-bgshape">
            <img src="../assets/images/bg-shape2.png" alt="img" />
            <img src="../assets/images/bg-leaf2.png" alt="img" />
        </div>
    </div>
    <!------------- About Section end ----------->
    <!------------- Achievment Section start ----------->
    <div class="ayur-bgcover ayur-achievement-sec">
        <div class="container">
            <div class="row  align-items-center">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap ayur-heading-left">
                        <h5>Our Recent Achievements</h5>
                        <h3>Benefit From Choosing The Best</h3>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="ayur-achieve-box-wrapper">
                        <div class="ayur-achieve-box">
                            <div class="ayur-achieve-icon">
                                <img src="assets/images/achieve-icon1.png" alt="icon">
                            </div>
                            <div class="ayur-achieve-text">
                                <h2 class="ayur-counting" data-to="25">25</h2>
                                <p>Years Experience</p>
                            </div>
                        </div>
                        <div class="ayur-achieve-box">
                            <div class="ayur-achieve-icon">
                                <img src="assets/images/achieve-icon2.png" alt="icon">
                            </div>
                            <div class="ayur-achieve-text">
                                <h2 class="ayur-counting" data-to="60">60 +</h2>
                                <p>Happy Customers</p>
                            </div>
                        </div>
                        <div class="ayur-achieve-box">
                            <div class="ayur-achieve-icon">
                                <img src="assets/images/achieve-icon3.png" alt="icon">
                            </div>
                            <div class="ayur-achieve-text">
                                <h2 class="ayur-counting" data-to="800">800 +</h2>
                                <p>Our Products</p>
                            </div>
                        </div>
                        <div class="ayur-achieve-box">
                            <div class="ayur-achieve-icon">
                                <img src="assets/images/achieve-icon4.png" alt="icon">
                            </div>
                            <div class="ayur-achieve-text">
                                <h2 class="ayur-counting percent" data-to="100%">100%</h2>
                                <p>Product Purity</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Achievment Section end ----------->
    <!------------- Trending Product Section start ----------->
    <div class="ayur-bgcover ayur-trenproduct-sec">
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

                @foreach ($is_tren as $tren)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="ayur-tpro-box ayur-trepro-box">
                            <div class="ayur-tpro-img">
                                <img src="{{ asset($tren->product_image) }}" alt="img">
                                <div class="ayur-tpro-sale">
                                    {{-- <p>Sale</p> --}}
                                    <div class="ayur-tpro-like">
                                        {{-- <a href="javascript:void(0)" class="ayur-tpor-click">
                                            <img src="{{ asset('assets/images/like.svg') }}" class="unlike" />
                                            <img src="{{ asset('assets/images/like-fill.svg') }}" class="like" />
                                        </a> --}}

                                        <a href="javascript:void(0)" class="ayur-tpor-click"
                                            data-product-id="{{ $tren->id }}">
                                            <img src="{{ asset('assets/images/like.svg') }}" class="unlike" />
                                            <img src="{{ asset('assets/images/like-fill.svg') }}" class="like d-none" />
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="ayur-tpro-text">
                                <h3><a href="shop-single.html">{{ $tren->product_name }}</a></h3>
                                <div class="ayur-tpro-price">
                                    <p><del>Rs{{ $tren->mrp }}</del>${{ $tren->mrp }}</p>
                                    <div class="ayur-tpro-star">
                                        <img src="assets/images/star-icon.png" alt="star">
                                        <p>4.5/5</p>
                                    </div>
                                </div>
                                <div class="ayur-tpro-btn">
                                    <a href="{{ url('/shop/' . $tren->product_slug) }}" class="ayur-btn ">
                                        <span>
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
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



            </div>
        </div>
        <div class="ayur-bgshape ayur-trenpro-bgshape">
            <img src="assets/images/bg-shape3.png" alt="img" />
            <img src="assets/images/bg-leaf3.png" alt="img" />
        </div>
    </div>
    <!------------- Trending Product Section end ----------->
    <!------------- Why Section start ----------->
    <div class="ayur-bgcover ayur-why-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap ayur-why-head">
                        <h5>Best For You</h5>
                        <h3>Why Sukh Darshan</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-why-secbox">
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon1.png" alt="icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>100 % Organic</h4>
                                <p>our products are made with ingredients grown without synthetic pesticides.</p>
                            </div>
                        </div>
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon2.png" alt="icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>Best Quality</h4>
                                <p>Most natural products—crafted with care, backed by tradition, and trusted for their
                                    purity </p>
                            </div>
                        </div>
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon3.png" alt="icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>Hygienic Product</h4>
                                <p>Stay protected with our hygienic products, designed to promote cleanliness.</p>
                            </div>
                        </div>
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon4.png" alt="icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>Health Care</h4>
                                <p>Health care is the support and services provided to maintain or improve a person's
                                    health.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-why-textheading">
                        <h3>Solve Your Problem with The Power of Nature</h3>
                        <p>Nature offers powerful solutions to modern challenges. Whether it’s boosting your immunity,
                            improving digestion, calming your mind, or relieving everyday discomforts, there’s a natural
                            path to wellness waiting for you,and holistic care, you can restore balance, reduce stress, and
                            improve your overall quality of life—gently and effectively.</p>
                        <ul>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Drawn from nature to help you.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Quis nostrud was exercitation.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Quis nostrud was exercitation.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Quis nostrud was exercitation.</p>
                            </li>
                        </ul>
                        <p>Discover how nature’s wisdom can be the key to your well-being. Harnessing the healing potential
                            of natural remedies, ancient practices, and holistic care, you can restore balance, reduce
                            stress.</p>
                        <div class="ayur-why-btn">
                            <a href="services.html" class="ayur-btn">Read More</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-video-section">
                        <div class="ayur-video-img">
                            <img src="https://dummyimage.com/1146x380/" alt="img">
                            <a href="javascript:void(0)" class="ayur-video-playicon" id="popup">
                                <img src="assets/images/play-icon.svg" alt="icon">
                            </a>
                            <div id="videoPopup1" class="ayur-popup">
                                <div class="ayur-popup-content">
                                    <span class="close" id="close">×</span>
                                    <iframe src="https://www.youtube.com/embed/hJTmi9euoNg" frameborder="0"
                                        allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="ayur-bgshape ayur-why-bgshape">
            <img src="assets/images/bg-shape4.png" alt="img" />
            <img src="assets/images/bg-leaf4.png" alt="img" />
        </div>
    </div>
    <!------------- Why Section end ----------->
    <!------------- Testimonial Section start ----------->
    <div class="ayur-bgcover ayur-testimonial-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap ayur-test-head">
                        <h5>Our Testimonial</h5>
                        <h3>What Our Client’s Say</h3>
                    </div>
                </div>
            </div>
            <div class="ayur-testimonial-section">
                <div class="swiper ayur-testimonial-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="ayur-test-box">
                                <div class="ayur-test-text">
                                    <p>"I've never felt more balanced and energized. Their natural approach truly works, and
                                        the care I received was exceptional. It's rare to find such genuine dedication to
                                        well-being and delivering holistic care that makes a real difference."
                                        — Abhinav Arora</p>
                                </div>
                                <div class="ayur-test-namesec">
                                    <div class="ayur-testname">
                                        <img src="{{ asset('assets/images/client2-removebg-preview.png') }}"
                                            style="width: 56%; height: 66px;" alt="image">
                                        <h3>Abhinav Arora</h3>
                                    </div>
                                    <div class="ayur-testquote">
                                        <svg width="74" height="53" viewBox="0 0 74 53" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.1"
                                                d="M13.8133 18.3798C12.1853 14.2231 9.62 10.1164 6.19133 6.16C5.106 4.90796 4.958 3.10504 5.846 1.70277C6.53667 0.600975 7.67133 0 8.90467 0C9.25 0 9.59533 0.0250397 9.94067 0.150242C17.1927 2.30374 34.1387 9.94113 34.6073 34.4309C34.78 43.8712 27.972 51.9844 19.1167 52.9109C14.208 53.4117 9.324 51.784 5.698 48.4787C3.90464 46.8276 2.47128 44.8141 1.48999 42.5673C0.508697 40.3205 0.0011672 37.8902 0 35.4325C0 27.1691 5.772 19.9324 13.8133 18.3798ZM58.4847 52.9109C53.6007 53.4117 48.7167 51.784 45.0907 48.4787C43.2972 46.8277 41.8638 44.8142 40.8824 42.5674C39.9011 40.3206 39.3937 37.8902 39.3927 35.4325C39.3927 27.1691 45.1647 19.9324 53.206 18.3798C51.578 14.2231 49.0127 10.1164 45.584 6.16C44.4987 4.90796 44.3507 3.10504 45.2387 1.70277C45.9293 0.600975 47.064 0 48.2973 0C48.6427 0 48.988 0.0250397 49.3333 0.150242C56.5853 2.30374 73.5313 9.94113 74 34.4309V34.7815C74 44.0715 67.266 51.9844 58.4847 52.9109Z"
                                                fill="#CD8973" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ayur-test-box">
                                <div class="ayur-test-text">
                                    <p>"The care and attention I received were exceptional. Their natural methods truly made
                                        a difference in my health and overall well-being. I feel more balanced, energized,
                                        and confident in my healing journey."
                                        Their words reflect the care, quality, and natural approach we bring to everything
                                        we do.
                                        — Akriti Sharma</p>
                                </div>
                                <div class="ayur-test-namesec">
                                    <div class="ayur-testname">
                                        <img src="{{ asset('assets/images/client1.jpg') }}"
                                            style="width: 56%; height: 66px;" alt="image">
                                        <h3>Akriti Sharma</h3>
                                    </div>
                                    <div class="ayur-testquote">
                                        <svg width="74" height="53" viewBox="0 0 74 53" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.1"
                                                d="M13.8133 18.3798C12.1853 14.2231 9.62 10.1164 6.19133 6.16C5.106 4.90796 4.958 3.10504 5.846 1.70277C6.53667 0.600975 7.67133 0 8.90467 0C9.25 0 9.59533 0.0250397 9.94067 0.150242C17.1927 2.30374 34.1387 9.94113 34.6073 34.4309C34.78 43.8712 27.972 51.9844 19.1167 52.9109C14.208 53.4117 9.324 51.784 5.698 48.4787C3.90464 46.8276 2.47128 44.8141 1.48999 42.5673C0.508697 40.3205 0.0011672 37.8902 0 35.4325C0 27.1691 5.772 19.9324 13.8133 18.3798ZM58.4847 52.9109C53.6007 53.4117 48.7167 51.784 45.0907 48.4787C43.2972 46.8277 41.8638 44.8142 40.8824 42.5674C39.9011 40.3206 39.3937 37.8902 39.3927 35.4325C39.3927 27.1691 45.1647 19.9324 53.206 18.3798C51.578 14.2231 49.0127 10.1164 45.584 6.16C44.4987 4.90796 44.3507 3.10504 45.2387 1.70277C45.9293 0.600975 47.064 0 48.2973 0C48.6427 0 48.988 0.0250397 49.3333 0.150242C56.5853 2.30374 73.5313 9.94113 74 34.4309V34.7815C74 44.0715 67.266 51.9844 58.4847 52.9109Z"
                                                fill="#CD8973" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ayur-test-box">
                                <div class="ayur-test-text">
                                    <p>"I had an amazing experience! Their natural approach truly made a difference in my
                                        overall health. The team was supportive, knowledgeable, and genuinely cared about my
                                        well-being. I feel more balanced and energized than ever before."
                                        — Mayank Sindhi</p>
                                </div>
                                <div class="ayur-test-namesec">
                                    <div class="ayur-testname">
                                        <img src="{{ asset('assets/images/client3.jpg') }}"
                                            style="width: 56%; height: 66px;" alt="image">
                                        <h3>Mayank Sindhi</h3>
                                    </div>
                                    <div class="ayur-testquote">
                                        <svg width="74" height="53" viewBox="0 0 74 53" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.1"
                                                d="M13.8133 18.3798C12.1853 14.2231 9.62 10.1164 6.19133 6.16C5.106 4.90796 4.958 3.10504 5.846 1.70277C6.53667 0.600975 7.67133 0 8.90467 0C9.25 0 9.59533 0.0250397 9.94067 0.150242C17.1927 2.30374 34.1387 9.94113 34.6073 34.4309C34.78 43.8712 27.972 51.9844 19.1167 52.9109C14.208 53.4117 9.324 51.784 5.698 48.4787C3.90464 46.8276 2.47128 44.8141 1.48999 42.5673C0.508697 40.3205 0.0011672 37.8902 0 35.4325C0 27.1691 5.772 19.9324 13.8133 18.3798ZM58.4847 52.9109C53.6007 53.4117 48.7167 51.784 45.0907 48.4787C43.2972 46.8277 41.8638 44.8142 40.8824 42.5674C39.9011 40.3206 39.3937 37.8902 39.3927 35.4325C39.3927 27.1691 45.1647 19.9324 53.206 18.3798C51.578 14.2231 49.0127 10.1164 45.584 6.16C44.4987 4.90796 44.3507 3.10504 45.2387 1.70277C45.9293 0.600975 47.064 0 48.2973 0C48.6427 0 48.988 0.0250397 49.3333 0.150242C56.5853 2.30374 73.5313 9.94113 74 34.4309V34.7815C74 44.0715 67.266 51.9844 58.4847 52.9109Z"
                                                fill="#CD8973" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev">
                    <svg width="34" height="16" viewBox="0 0 34 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.765606 7.08664L0.766766 7.08542L7.50896 0.375738C8.01406 -0.126907 8.83103 -0.125037 9.33381 0.380125C9.83652 0.885222 9.83458 1.70219 9.32948 2.2049L4.80277 6.70968H32.1291C32.8418 6.70968 33.4194 7.28735 33.4194 8C33.4194 8.71265 32.8418 9.29032 32.1291 9.29032H4.80283L9.32942 13.7951C9.83451 14.2978 9.83645 15.1148 9.33374 15.6199C8.83097 16.1251 8.01393 16.1268 7.5089 15.6243L0.766701 8.91458L0.765541 8.91336C0.260185 8.40897 0.261799 7.58935 0.765606 7.08664Z"
                            fill="#797979" />
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg width="34" height="16" viewBox="0 0 34 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M32.6538 7.08664L32.6527 7.08542L25.9105 0.375738C25.4054 -0.126907 24.5884 -0.125037 24.0856 0.380125C23.5829 0.885222 23.5849 1.70219 24.09 2.2049L28.6167 6.70968H1.29032C0.577678 6.70968 0 7.28735 0 8C0 8.71265 0.577678 9.29032 1.29032 9.29032H28.6166L24.09 13.7951C23.5849 14.2978 23.583 15.1148 24.0857 15.6199C24.5885 16.1251 25.4055 16.1268 25.9105 15.6243L32.6527 8.91458L32.6539 8.91336C33.1592 8.40897 33.1576 7.58935 32.6538 7.08664Z"
                            fill="#CD8973" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!------------- Testimonial Section end ----------->
    <!------------- Team Section start ----------->

    <div class="ayur-bgcover ayur-blog-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap">
                        <h5>Blog</h5>
                        <h3>Our Latest News</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($blog as $blogs)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="ayur-blog-box">
                            <div class="ayur-blog-img">
                                <img src="{{ asset($blogs->blog_image) }}" alt="image">
                            </div>
                            <div class="ayur-blog-text">
                                <div class="ayur-blog-date">
                                    <h4>{{ $blogs->blog_type }}</h4>
                                    <p>{{ $blogs->created_at->format('F d, Y') }}</p>
                                </div>
                                <h3><a href="{{ url('/blog/' . $blogs->blog_slug) }}">{{ $blogs->blog_name }}</a></h3>
                                <p>{{ $blogs->blog_shortdesc }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-4 col-md-12 col-sm-12">
                    @foreach ($recentBlogs as $blog)
                        <div class="ayur-blog-box ayur-blog-inline">
                            <div class="ayur-blog-img">
                                <img src="{{ asset($blog->blog_image) }}" alt="image">
                            </div>
                            <div class="ayur-blog-text">
                                <div class="ayur-blog-date">
                                    <h4><a href="{{ url('/blog/' . $blog->blog_slug) }}">{{ $blog->blog_name }}</a></h4>
                                </div>
                                <h3>{{ $blog->blog_shortdesc }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-blog-bgshape">
            <img src="../assets/images/bg-shape6.png" alt="img" />
            <img src="../assets/images/bg-leaf6.png" alt="img" />
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

@endsection
