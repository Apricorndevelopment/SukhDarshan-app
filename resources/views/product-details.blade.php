@extends('layouts/layout')
@section('page_title', 'Shop')
@section('container')


    <div class="ayur-bread-section">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>Shop Details</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="index.html">Home</a>
                                </span>
                                <span class=""><a href="shop.html">Shop</a></span>
                                <span class="ayur-active-page">Shop-details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Breadcrumb Section end ----------->
    <!------------- Shop single page Section start ----------->
    <!------------- Shop single page Section start ----------->
    <div class="ayur-bgcover ayur-shopsin-section">
        <div class="container">
            <div class="row align-items-start">
                {{-- Left Section: Main Image + Additional Images --}}
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

                {{-- Right Section: Product Details --}}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="ayur-shopsin-details">
                        <div class="ayur-tpro-price">
                            <p><del>Rs{{ $product->mrp }}</del> Rs{{ $product->price }}</p>
                        </div>
                        <div class="ayur-shopsin-heaing">
                            <h3>{{ $product->product_name }}</h3>
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
                        <div class="ayur-shopsin-quantity">
                            <input type="number" class="form-control product-quantity" value="1" min="1"
                                max="3" />
                            <button class="shop-add"><span></span></button>
                            <button class="shop-sub"><span></span></button>
                        </div>
                        <div class="ayur-shopsin-btn">
                            <a href="javascript:void(0);" class="ayur-btn add-to-cart" data-id="{{ $product->id }}">
                                Add To Cart
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Optional Debug Info (remove in production) --}}
                @php
                    $currentAction = class_basename(Route::currentRouteAction());
                    [$controller, $method] = explode('@', $currentAction);
                @endphp

                <div class="col-12 mt-3">
                    Controller: {{ $controller }} <br>
                    Method: {{ $method }}
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
                                    <p>{{ $product->prodcut_desc }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                                tabindex="0">
                                {{-- Reviews section (unchanged) --}}
                                {{-- Keep your existing review code here --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ayur-bgshape ayur-shopsin">
            <img src="assets/images/bg-shape1.png" alt="img">
        </div>
    </div>


    <div class="ayur-bgcover ayur-testimonial-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap">
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
                                    <p>Amet minim mollit non deserunt ullamco est sit aliqua as dolor do amet. officia
                                        consequat duis enim velit mollit. Exercitation it’s veam consequat sunt nostrud
                                        amet. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id es.</p>
                                </div>
                                <div class="ayur-test-namesec">
                                    <div class="ayur-testname">
                                        <img src="https://dummyimage.com/56x56/" alt="image">
                                        <h3>Leslie Alexander</h3>
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
                                    <p>Amet minim mollit non deserunt ullamco est sit aliqua as dolor do amet. officia
                                        consequat duis enim velit mollit. Exercitation it’s veam consequat sunt nostrud
                                        amet. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id es.</p>
                                </div>
                                <div class="ayur-test-namesec">
                                    <div class="ayur-testname">
                                        <img src="https://dummyimage.com/56x56/" alt="image">
                                        <h3>Brooklyn Simmons</h3>
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
                                    <p>Amet minim mollit non deserunt ullamco est sit aliqua as dolor do amet. officia
                                        consequat duis enim velit mollit. Exercitation it’s veam consequat sunt nostrud
                                        amet. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id es.</p>
                                </div>
                                <div class="ayur-test-namesec">
                                    <div class="ayur-testname">
                                        <img src="https://dummyimage.com/56x56/" alt="image">
                                        <h3>Leslie Alexander</h3>
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
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="ayur-tpro-box ayur-trepro-box">
                        <div class="ayur-tpro-img">
                            <img src="https://dummyimage.com/259x244/" alt="img">
                            <div class="ayur-tpro-sale">
                                <p>Sale</p>
                                <div class="ayur-tpro-like">
                                    <a href="javascript:void(0)" class="ayur-tpor-click">
                                        <img src="assets/images/like.svg" class="unlike" />
                                        <img src="assets/images/like-fill.svg" class="like" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ayur-tpro-text">
                            <h3><a href="shop-single.html">Herbal Oil Medicine</a></h3>
                            <div class="ayur-tpro-price">
                                <p><del>$100</del>$50</p>
                                <div class="ayur-tpro-star">
                                    <img src="assets/images/star-icon.png" alt="star">
                                    <p>4.5/5</p>
                                </div>
                            </div>
                            <div class="ayur-tpro-btn">
                                <a href="cart.html" class="ayur-btn">
                                    <span><svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.826087 2.39643e-08C0.606995 2.39643e-08 0.396877 0.0870339 0.241955 0.241955C0.0870339 0.396877 0 0.606995 0 0.826087C0 1.04518 0.0870339 1.2553 0.241955 1.41022C0.396877 1.56514 0.606995 1.65217 0.826087 1.65217H2.29652C2.4166 1.65238 2.53358 1.69029 2.63096 1.76054C2.72834 1.8308 2.8012 1.92986 2.83926 2.04374L5.56287 10.2162C5.6843 10.5797 5.69917 10.9696 5.60665 11.3413L5.38278 12.2393C5.05317 13.5561 6.07835 14.8696 7.43478 14.8696H17.3478C17.5669 14.8696 17.777 14.7825 17.932 14.6276C18.0869 14.4727 18.1739 14.2626 18.1739 14.0435C18.1739 13.8244 18.0869 13.6143 17.932 13.4593C17.777 13.3044 17.5669 13.2174 17.3478 13.2174H7.43478C7.11261 13.2174 6.90609 12.953 6.98457 12.6416L7.15391 11.9659C7.18244 11.8516 7.24833 11.7501 7.34112 11.6775C7.43391 11.6049 7.54828 11.5654 7.66609 11.5652H16.5217C16.6953 11.5654 16.8646 11.511 17.0055 11.4095C17.1463 11.3081 17.2517 11.1649 17.3065 11.0002L19.508 4.39148C19.5494 4.26729 19.5607 4.13505 19.5409 4.00566C19.5211 3.87626 19.4709 3.75342 19.3943 3.64725C19.3178 3.54108 19.2171 3.45463 19.1005 3.39501C18.984 3.33539 18.855 3.30432 18.7241 3.30435H5.415C5.29478 3.30431 5.17762 3.26649 5.08007 3.19622C4.98253 3.12595 4.90954 3.0268 4.87143 2.91278L4.0883 0.565043C4.03349 0.400482 3.92828 0.257348 3.78757 0.15593C3.64686 0.0545128 3.4778 -4.17427e-05 3.30435 2.39643e-08H0.826087ZM6.6087 15.6957C6.17051 15.6957 5.75028 15.8697 5.44043 16.1796C5.13059 16.4894 4.95652 16.9096 4.95652 17.3478C4.95652 17.786 5.13059 18.2062 5.44043 18.5161C5.75028 18.8259 6.17051 19 6.6087 19C7.04688 19 7.46712 18.8259 7.77696 18.5161C8.0868 18.2062 8.26087 17.786 8.26087 17.3478C8.26087 16.9096 8.0868 16.4894 7.77696 16.1796C7.46712 15.8697 7.04688 15.6957 6.6087 15.6957ZM16.5217 15.6957C16.0836 15.6957 15.6633 15.8697 15.3535 16.1796C15.0436 16.4894 14.8696 16.9096 14.8696 17.3478C14.8696 17.786 15.0436 18.2062 15.3535 18.5161C15.6633 18.8259 16.0836 19 16.5217 19C16.9599 19 17.3802 18.8259 17.69 18.5161C17.9998 18.2062 18.1739 17.786 18.1739 17.3478C18.1739 16.9096 17.9998 16.4894 17.69 16.1796C17.3802 15.8697 16.9599 15.6957 16.5217 15.6957Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="ayur-tpro-box ayur-trepro-box">
                        <div class="ayur-tpro-img">
                            <img src="https://dummyimage.com/259x244/" alt="img">
                            <div class="ayur-tpro-sale ayur-tpro-sale-off">
                                <p>30% Off</p>
                                <div class="ayur-tpro-like">
                                    <a href="javascript:void(0)" class="ayur-tpor-click">
                                        <img src="assets/images/like.svg" class="unlike" />
                                        <img src="assets/images/like-fill.svg" class="like" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ayur-tpro-text">
                            <h3><a href="shop-single.html">Herbal Oil Medicine</a></h3>
                            <div class="ayur-tpro-price">
                                <p><del>$100</del>$50</p>
                                <div class="ayur-tpro-star">
                                    <img src="assets/images/star-icon.png" alt="star">
                                    <p>4.5/5</p>
                                </div>
                            </div>
                            <div class="ayur-tpro-btn">
                                <a href="cart.html" class="ayur-btn">
                                    <span><svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.826087 2.39643e-08C0.606995 2.39643e-08 0.396877 0.0870339 0.241955 0.241955C0.0870339 0.396877 0 0.606995 0 0.826087C0 1.04518 0.0870339 1.2553 0.241955 1.41022C0.396877 1.56514 0.606995 1.65217 0.826087 1.65217H2.29652C2.4166 1.65238 2.53358 1.69029 2.63096 1.76054C2.72834 1.8308 2.8012 1.92986 2.83926 2.04374L5.56287 10.2162C5.6843 10.5797 5.69917 10.9696 5.60665 11.3413L5.38278 12.2393C5.05317 13.5561 6.07835 14.8696 7.43478 14.8696H17.3478C17.5669 14.8696 17.777 14.7825 17.932 14.6276C18.0869 14.4727 18.1739 14.2626 18.1739 14.0435C18.1739 13.8244 18.0869 13.6143 17.932 13.4593C17.777 13.3044 17.5669 13.2174 17.3478 13.2174H7.43478C7.11261 13.2174 6.90609 12.953 6.98457 12.6416L7.15391 11.9659C7.18244 11.8516 7.24833 11.7501 7.34112 11.6775C7.43391 11.6049 7.54828 11.5654 7.66609 11.5652H16.5217C16.6953 11.5654 16.8646 11.511 17.0055 11.4095C17.1463 11.3081 17.2517 11.1649 17.3065 11.0002L19.508 4.39148C19.5494 4.26729 19.5607 4.13505 19.5409 4.00566C19.5211 3.87626 19.4709 3.75342 19.3943 3.64725C19.3178 3.54108 19.2171 3.45463 19.1005 3.39501C18.984 3.33539 18.855 3.30432 18.7241 3.30435H5.415C5.29478 3.30431 5.17762 3.26649 5.08007 3.19622C4.98253 3.12595 4.90954 3.0268 4.87143 2.91278L4.0883 0.565043C4.03349 0.400482 3.92828 0.257348 3.78757 0.15593C3.64686 0.0545128 3.4778 -4.17427e-05 3.30435 2.39643e-08H0.826087ZM6.6087 15.6957C6.17051 15.6957 5.75028 15.8697 5.44043 16.1796C5.13059 16.4894 4.95652 16.9096 4.95652 17.3478C4.95652 17.786 5.13059 18.2062 5.44043 18.5161C5.75028 18.8259 6.17051 19 6.6087 19C7.04688 19 7.46712 18.8259 7.77696 18.5161C8.0868 18.2062 8.26087 17.786 8.26087 17.3478C8.26087 16.9096 8.0868 16.4894 7.77696 16.1796C7.46712 15.8697 7.04688 15.6957 6.6087 15.6957ZM16.5217 15.6957C16.0836 15.6957 15.6633 15.8697 15.3535 16.1796C15.0436 16.4894 14.8696 16.9096 14.8696 17.3478C14.8696 17.786 15.0436 18.2062 15.3535 18.5161C15.6633 18.8259 16.0836 19 16.5217 19C16.9599 19 17.3802 18.8259 17.69 18.5161C17.9998 18.2062 18.1739 17.786 18.1739 17.3478C18.1739 16.9096 17.9998 16.4894 17.69 16.1796C17.3802 15.8697 16.9599 15.6957 16.5217 15.6957Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="ayur-tpro-box ayur-trepro-box">
                        <div class="ayur-tpro-img">
                            <img src="https://dummyimage.com/259x244/" alt="img">
                            <div class="ayur-tpro-sale ayur-tpro-sale-star">
                                <div class="ayur-tpro-like">
                                    <a href="javascript:void(0)" class="ayur-tpor-click">
                                        <img src="assets/images/like.svg" class="unlike" />
                                        <img src="assets/images/like-fill.svg" class="like" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ayur-tpro-text">
                            <h3><a href="shop-single.html">Herbal Oil Medicine</a></h3>
                            <div class="ayur-tpro-price">
                                <p><del>$100</del>$50</p>
                                <div class="ayur-tpro-star">
                                    <img src="assets/images/star-icon.png" alt="star">
                                    <p>4.5/5</p>
                                </div>
                            </div>
                            <div class="ayur-tpro-btn">
                                <a href="cart.html" class="ayur-btn">
                                    <span><svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.826087 2.39643e-08C0.606995 2.39643e-08 0.396877 0.0870339 0.241955 0.241955C0.0870339 0.396877 0 0.606995 0 0.826087C0 1.04518 0.0870339 1.2553 0.241955 1.41022C0.396877 1.56514 0.606995 1.65217 0.826087 1.65217H2.29652C2.4166 1.65238 2.53358 1.69029 2.63096 1.76054C2.72834 1.8308 2.8012 1.92986 2.83926 2.04374L5.56287 10.2162C5.6843 10.5797 5.69917 10.9696 5.60665 11.3413L5.38278 12.2393C5.05317 13.5561 6.07835 14.8696 7.43478 14.8696H17.3478C17.5669 14.8696 17.777 14.7825 17.932 14.6276C18.0869 14.4727 18.1739 14.2626 18.1739 14.0435C18.1739 13.8244 18.0869 13.6143 17.932 13.4593C17.777 13.3044 17.5669 13.2174 17.3478 13.2174H7.43478C7.11261 13.2174 6.90609 12.953 6.98457 12.6416L7.15391 11.9659C7.18244 11.8516 7.24833 11.7501 7.34112 11.6775C7.43391 11.6049 7.54828 11.5654 7.66609 11.5652H16.5217C16.6953 11.5654 16.8646 11.511 17.0055 11.4095C17.1463 11.3081 17.2517 11.1649 17.3065 11.0002L19.508 4.39148C19.5494 4.26729 19.5607 4.13505 19.5409 4.00566C19.5211 3.87626 19.4709 3.75342 19.3943 3.64725C19.3178 3.54108 19.2171 3.45463 19.1005 3.39501C18.984 3.33539 18.855 3.30432 18.7241 3.30435H5.415C5.29478 3.30431 5.17762 3.26649 5.08007 3.19622C4.98253 3.12595 4.90954 3.0268 4.87143 2.91278L4.0883 0.565043C4.03349 0.400482 3.92828 0.257348 3.78757 0.15593C3.64686 0.0545128 3.4778 -4.17427e-05 3.30435 2.39643e-08H0.826087ZM6.6087 15.6957C6.17051 15.6957 5.75028 15.8697 5.44043 16.1796C5.13059 16.4894 4.95652 16.9096 4.95652 17.3478C4.95652 17.786 5.13059 18.2062 5.44043 18.5161C5.75028 18.8259 6.17051 19 6.6087 19C7.04688 19 7.46712 18.8259 7.77696 18.5161C8.0868 18.2062 8.26087 17.786 8.26087 17.3478C8.26087 16.9096 8.0868 16.4894 7.77696 16.1796C7.46712 15.8697 7.04688 15.6957 6.6087 15.6957ZM16.5217 15.6957C16.0836 15.6957 15.6633 15.8697 15.3535 16.1796C15.0436 16.4894 14.8696 16.9096 14.8696 17.3478C14.8696 17.786 15.0436 18.2062 15.3535 18.5161C15.6633 18.8259 16.0836 19 16.5217 19C16.9599 19 17.3802 18.8259 17.69 18.5161C17.9998 18.2062 18.1739 17.786 18.1739 17.3478C18.1739 16.9096 17.9998 16.4894 17.69 16.1796C17.3802 15.8697 16.9599 15.6957 16.5217 15.6957Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="ayur-tpro-box ayur-trepro-box">
                        <div class="ayur-tpro-img">
                            <img src="https://dummyimage.com/259x244/" alt="img">
                            <div class="ayur-tpro-sale ayur-tpro-sale-star">
                                <div class="ayur-tpro-like">
                                    <a href="javascript:void(0)" class="ayur-tpor-click">
                                        <img src="assets/images/like.svg" class="unlike" />
                                        <img src="assets/images/like-fill.svg" class="like" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ayur-tpro-text">
                            <h3><a href="shop-single.html">Herbal Oil Medicine</a></h3>
                            <div class="ayur-tpro-price">
                                <p><del>$100</del>$50</p>
                                <div class="ayur-tpro-star">
                                    <img src="assets/images/star-icon.png" alt="star">
                                    <p>4.5/5</p>
                                </div>
                            </div>

                            <div class="ayur-tpro-btn">
                                <a href="cart.html" class="ayur-btn">
                                    <span><svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.826087 2.39643e-08C0.606995 2.39643e-08 0.396877 0.0870339 0.241955 0.241955C0.0870339 0.396877 0 0.606995 0 0.826087C0 1.04518 0.0870339 1.2553 0.241955 1.41022C0.396877 1.56514 0.606995 1.65217 0.826087 1.65217H2.29652C2.4166 1.65238 2.53358 1.69029 2.63096 1.76054C2.72834 1.8308 2.8012 1.92986 2.83926 2.04374L5.56287 10.2162C5.6843 10.5797 5.69917 10.9696 5.60665 11.3413L5.38278 12.2393C5.05317 13.5561 6.07835 14.8696 7.43478 14.8696H17.3478C17.5669 14.8696 17.777 14.7825 17.932 14.6276C18.0869 14.4727 18.1739 14.2626 18.1739 14.0435C18.1739 13.8244 18.0869 13.6143 17.932 13.4593C17.777 13.3044 17.5669 13.2174 17.3478 13.2174H7.43478C7.11261 13.2174 6.90609 12.953 6.98457 12.6416L7.15391 11.9659C7.18244 11.8516 7.24833 11.7501 7.34112 11.6775C7.43391 11.6049 7.54828 11.5654 7.66609 11.5652H16.5217C16.6953 11.5654 16.8646 11.511 17.0055 11.4095C17.1463 11.3081 17.2517 11.1649 17.3065 11.0002L19.508 4.39148C19.5494 4.26729 19.5607 4.13505 19.5409 4.00566C19.5211 3.87626 19.4709 3.75342 19.3943 3.64725C19.3178 3.54108 19.2171 3.45463 19.1005 3.39501C18.984 3.33539 18.855 3.30432 18.7241 3.30435H5.415C5.29478 3.30431 5.17762 3.26649 5.08007 3.19622C4.98253 3.12595 4.90954 3.0268 4.87143 2.91278L4.0883 0.565043C4.03349 0.400482 3.92828 0.257348 3.78757 0.15593C3.64686 0.0545128 3.4778 -4.17427e-05 3.30435 2.39643e-08H0.826087ZM6.6087 15.6957C6.17051 15.6957 5.75028 15.8697 5.44043 16.1796C5.13059 16.4894 4.95652 16.9096 4.95652 17.3478C4.95652 17.786 5.13059 18.2062 5.44043 18.5161C5.75028 18.8259 6.17051 19 6.6087 19C7.04688 19 7.46712 18.8259 7.77696 18.5161C8.0868 18.2062 8.26087 17.786 8.26087 17.3478C8.26087 16.9096 8.0868 16.4894 7.77696 16.1796C7.46712 15.8697 7.04688 15.6957 6.6087 15.6957ZM16.5217 15.6957C16.0836 15.6957 15.6633 15.8697 15.3535 16.1796C15.0436 16.4894 14.8696 16.9096 14.8696 17.3478C14.8696 17.786 15.0436 18.2062 15.3535 18.5161C15.6633 18.8259 16.0836 19 16.5217 19C16.9599 19 17.3802 18.8259 17.69 18.5161C17.9998 18.2062 18.1739 17.786 18.1739 17.3478C18.1739 16.9096 17.9998 16.4894 17.69 16.1796C17.3802 15.8697 16.9599 15.6957 16.5217 15.6957Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-trenpro-bgshape">
            <img src="assets/images/bg-shape3.png" alt="img" />
            <img src="assets/images/bg-leaf3.png" alt="img" />
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
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
    </script> --}}
    <script>
        $('.add-to-cart').on('click', function() {
            var productId = $(this).data('id');
            var quantity = $(this).closest('.ayur-shopsin-details').find('.product-quantity').val();

            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    alert(response.message);
                    // Optional: Update cart count / total
                }
            });
        });
    </script>

@endsection
