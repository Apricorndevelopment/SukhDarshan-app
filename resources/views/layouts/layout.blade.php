<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Sukh Darshan</title>
    <meta charset="UTF-8">
    <meta name="description" content="Web">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Sukh Darshan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/select2.min.css">
    <link rel="stylesheet" href="../assets/css/flatpickr.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/loginform.css">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('../adminassets/images/SDP LOGO.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!------------- Loader start ----------->
    <div class="ayur-loader">
        <div class="ayur-spin">
            <img src="{{ asset('assets/images/loader.gif') }}" alt="loader">
        </div>
    </div>
    <!------------- Loader End ----------->
    <!------------- Header Section start ----------->
    <div class="ayur-menu-wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-4 col-sm-5 col-6">
                    <div class="ayur-menu-logo">

                        <a href="/"><img style="height: 60px; width:60%"
                                src="{{ asset($logo->logo ?? 'uploads/logos/defaultlogo.png') }}" alt="Company Logo">
                        </a>

                    </div>
                </div>
                <div class="col-lg-10 col-md-8 col-sm-7 col-6">
                    <div class="ayur-navmenu-wrapper">
                        <div class="ayur-nav-menu">
                            <ul>
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('shop') }}">Shop</a></li>
                                {{-- <li><a href="{{ route('services') }}">Services</a></li> --}}
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                        <div class="ayur-nav-icons">
                            <div class="ayur-nav-like">
                                <a href="{{ route('wishlist') }}">
                                    <span class="icon">
                                        <svg width="21" height="17" viewBox="0 0 21 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.6647 0C12.9947 0 11.5308 0.744645 10.4311 2.15348C10.2912 2.33306 10.16 2.51925 10.0379 2.7114C9.91579 2.51925 9.78456 2.33306 9.64463 2.15348C8.54497 0.744645 7.08101 0 5.41104 0C2.25633 0 0 2.64149 0 5.81114C0 9.43548 2.97046 12.8513 9.63153 16.8865C9.75642 16.9622 9.89715 17 10.0379 17C10.1786 17 10.3193 16.9622 10.4442 16.8866C17.1053 12.8513 20.0757 9.43552 20.0757 5.81118C20.0757 2.64318 17.8213 0 14.6647 0ZM16.4353 10.3241C15.0486 11.8714 12.953 13.5007 10.0379 15.2969C7.12277 13.5007 5.02717 11.8714 3.64041 10.3241C2.24617 8.7684 1.56842 7.2922 1.56842 5.81118C1.56842 3.52898 3.11072 1.56842 5.41104 1.56842C6.58249 1.56842 7.58134 2.07776 8.37986 3.08233C9.01836 3.88572 9.28738 4.71529 9.28927 4.72121C9.33905 4.88083 9.43853 5.02035 9.57321 5.11943C9.7079 5.2185 9.87072 5.27194 10.0379 5.27194C10.2051 5.27194 10.3679 5.2185 10.5026 5.11943C10.6373 5.02035 10.7368 4.88083 10.7866 4.72121C10.789 4.71329 11.05 3.90959 11.6675 3.11848C12.4703 2.08992 13.4787 1.56838 14.6647 1.56838C16.9675 1.56838 18.5073 3.53082 18.5073 5.81114C18.5073 7.29216 17.8296 8.76836 16.4353 10.3241Z"
                                                fill="#222222" />
                                        </svg>
                                    </span>

                                </a>
                            </div>
                            <div class="ayur-nav-product">
                                <a href="{{ route('carthome') }}">
                                    <span class="icon">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.91343 4.14634H2.81175C2.44474 4.14636 2.09137 4.28542 1.82279 4.53554C1.55421 4.78565 1.39037 5.12824 1.36426 5.49432L0.65358 15.4455C0.639403 15.6443 0.666313 15.8439 0.732633 16.0318C0.798954 16.2197 0.903263 16.3919 1.03906 16.5378C1.17486 16.6836 1.33924 16.7999 1.52195 16.8794C1.70466 16.9589 1.9018 17 2.10107 17H13.5881C13.7873 16.9999 13.9844 16.9587 14.1671 16.8792C14.3497 16.7996 14.514 16.6833 14.6498 16.5375C14.7856 16.3917 14.8899 16.2195 14.9563 16.0316C15.0226 15.8438 15.0496 15.6443 15.0356 15.4455L14.3249 5.49432C14.2988 5.12824 14.1349 4.78565 13.8664 4.53554C13.5978 4.28542 13.2444 4.14636 12.8774 4.14634H11.7836V3.93902C11.7836 2.89433 11.3686 1.89242 10.6299 1.15371C9.89118 0.415003 8.88927 0 7.84458 0C5.7486 0 3.81143 1.66932 3.90556 3.93902L3.91343 4.14634ZM11.7836 5.39024V8.5C11.7836 8.66495 11.7181 8.82315 11.6014 8.93979C11.4848 9.05642 11.3266 9.12195 11.1617 9.12195C10.9967 9.12195 10.8385 9.05642 10.7219 8.93979C10.6052 8.82315 10.5397 8.66495 10.5397 8.5V5.39024H5.14946V8.5C5.14946 8.66495 5.08393 8.82315 4.96729 8.93979C4.85065 9.05642 4.69246 9.12195 4.52751 9.12195C4.36255 9.12195 4.20436 9.05642 4.08772 8.93979C3.97108 8.82315 3.90556 8.66495 3.90556 8.5C3.90556 8.5 3.95946 7.04671 3.94163 5.39024H2.81175C2.7594 5.39032 2.70902 5.41019 2.67072 5.44588C2.63241 5.48156 2.60903 5.53042 2.60526 5.58263L1.89417 15.5339C1.89211 15.5623 1.89594 15.5908 1.90541 15.6177C1.91488 15.6446 1.92979 15.6692 1.94921 15.69C1.96862 15.7109 1.99213 15.7275 2.01825 15.7389C2.04438 15.7503 2.07257 15.7561 2.10107 15.7561H13.5881C13.6165 15.756 13.6447 15.7501 13.6708 15.7386C13.6968 15.7272 13.7203 15.7106 13.7397 15.6898C13.7591 15.669 13.774 15.6444 13.7835 15.6176C13.793 15.5907 13.7969 15.5622 13.795 15.5339L13.0839 5.58263C13.0801 5.53042 13.0567 5.48156 13.0184 5.44588C12.9801 5.41019 12.9298 5.39032 12.8774 5.39024H11.7836ZM10.5397 4.14634V3.93902C10.5397 3.22423 10.2558 2.53872 9.75032 2.03329C9.24489 1.52785 8.55937 1.2439 7.84458 1.2439C7.12979 1.2439 6.44427 1.52785 5.93884 2.03329C5.43341 2.53872 5.14946 3.22423 5.14946 3.93902V4.14634H10.5397Z"
                                                fill="#222222" />
                                        </svg>
                                    </span>
                                    <span class="ayur-nav-provalue">2</span>

                                </a>
                            </div>

                            <div class="ayur-nav-user">
                                @guest

                                    <a href="{{ route('login') }}">
                                        <span class="icon">
                                            <!-- Login User Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                <path fill-rule="evenodd"
                                                    d="M8 9a5 5 0 0 0-4.546 2.916.5.5 0 0 0 .832.554A4 4 0 0 1 8 10a4 4 0 0 1 3.714 2.47.5.5 0 0 0 .832-.554A5 5 0 0 0 8 9z" />
                                            </svg>
                                        </span>
                                    </a>

                                @endguest

                                @auth
                                    {{-- Logout Button (Only for authenticated users) --}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            <span class="icon">
                                                <!-- Logout Icon -->
                                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 2L13 13M13 2L2 13" stroke="#222222" stroke-width="2" />
                                                    <!-- Replace with your preferred logout icon -->
                                                </svg>
                                            </span>
                                        </button>
                                    </form>
                                @endauth
                            </div>

                        </div>
                        <div class="ayur-toggle-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="main-content">
        <div class="section__content">
            {{-- <div class="container-fluid"> --}}
            @section('container') @show
            {{-- </div> --}}
        </div>

    </section>



    <div class="ayur-footer-section">
        <div class="container">
            <div class="ayur-sign-sec">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="ayur-sign-head">
                            <h3>Sign Up To Get Updates & News About Us..</h3>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <form method="" class="ayur-subscribe-sec">
                            <div class="ayur-form-input">
                                <input type="email" class="form-control" placeholder="Enter Your Email..."
                                    name="email" />
                            </div>
                            <div class="ayur-form-btn">
                                <a href="{{ route('contact') }}" class="ayur-btn">Subscribe</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ayur-footer-sec">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="ayur-footer-logosec">
                            <div class="ayur-footer-logo">
                                <img src="{{ asset('../adminassets/images/SDPfooter.png') }}" style="height:100px;"
                                    alt="logo" />
                            </div>
                            <p>our mission is to promote natural healing and holistic wellness. We offer authentic
                                Ayurvedic solutions that restore balance to the body, mind.</p>
                            <ul class="ayur-social-link">
                                <li>
                                    <a href="javascript:void(0)">
                                        <svg width="11" height="20" viewBox="0 0 11 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.74157 20V10.8777H9.80231L10.2615 7.32156H6.74157V5.05147C6.74157 4.0222 7.02622 3.32076 8.50386 3.32076L10.3854 3.31999V0.13923C10.06 0.0969453 8.94308 0 7.64308 0C4.92848 0 3.07002 1.65697 3.07002 4.69927V7.32156H0V10.8777H3.07002V20H6.74157Z"
                                                fill="#E4D4CF" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8138 8.46864L19.0991 0H17.3727L11.0469 7.3532L5.9944 0H0.166992L7.8073 11.1193L0.166992 20H1.89349L8.57377 12.2348L13.9095 20H19.7369L11.8133 8.46864H11.8138ZM9.4491 11.2173L8.67498 10.1101L2.51557 1.29967H5.16736L10.1381 8.40994L10.9122 9.51718L17.3735 18.7594H14.7218L9.4491 11.2177V11.2173Z"
                                                fill="#E4D4CF" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <svg width="17" height="20" viewBox="0 0 17 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.89667 0C3.41417 0.000833333 0.5 3.51333 0.5 7.34333C0.5 9.11917 1.4925 11.335 3.08167 12.0375C3.535 12.2417 3.475 11.9925 3.865 10.5008C3.88295 10.4406 3.88454 10.3766 3.8696 10.3156C3.85466 10.2545 3.82374 10.1985 3.78 10.1533C1.50833 7.52583 3.33667 2.12417 8.5725 2.12417C16.15 2.12417 14.7342 12.6092 9.89083 12.6092C8.6425 12.6092 7.7125 11.6292 8.00667 10.4167C8.36333 8.9725 9.06167 7.42 9.06167 6.37917C9.06167 3.75583 5.15333 4.145 5.15333 7.62083C5.15333 8.695 5.53333 9.42 5.53333 9.42C5.53333 9.42 4.27583 14.5 4.0425 15.4492C3.6475 17.0558 4.09583 19.6567 4.135 19.8808C4.15917 20.0042 4.2975 20.0433 4.375 19.9417C4.49917 19.7792 6.01917 17.6108 6.445 16.0433C6.6 15.4725 7.23583 13.1558 7.23583 13.1558C7.655 13.9125 8.86333 14.5458 10.1508 14.5458C13.9808 14.5458 16.7492 11.1792 16.7492 7.00167C16.7358 2.99667 13.3083 0 8.89667 0Z"
                                                fill="#E4D4CF" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.4996 0H5.49988C2.75019 0 0.5 2.25019 0.5 4.99988V15.0001C0.5 17.7491 2.75019 20 5.49988 20H15.4996C18.2493 20 20.4995 17.7491 20.4995 15.0001V4.99988C20.4995 2.25019 18.2493 0 15.4996 0ZM18.8328 15.0001C18.8328 16.8376 17.3381 18.3333 15.4996 18.3333H5.49988C3.66218 18.3333 2.16671 16.8376 2.16671 15.0001V4.99988C2.16671 3.16193 3.66218 1.66671 5.49988 1.66671H15.4996C17.3381 1.66671 18.8328 3.16193 18.8328 4.99988V15.0001Z"
                                                fill="#E4D4CF" />
                                            <path
                                                d="M15.9172 5.83295C16.6075 5.83295 17.1672 5.27332 17.1672 4.58298C17.1672 3.89264 16.6075 3.33301 15.9172 3.33301C15.2269 3.33301 14.6672 3.89264 14.6672 4.58298C14.6672 5.27332 15.2269 5.83295 15.9172 5.83295Z"
                                                fill="#E4D4CF" />
                                            <path
                                                d="M10.4999 5C7.73793 5 5.5 7.23818 5.5 9.99988C5.5 12.7606 7.73793 15.0002 10.4999 15.0002C13.261 15.0002 15.4998 12.7606 15.4998 9.99988C15.4998 7.23818 13.261 5 10.4999 5ZM10.4999 13.3335C8.65915 13.3335 7.16671 11.8411 7.16671 9.99988C7.16671 8.15866 8.65915 6.66671 10.4999 6.66671C12.3406 6.66671 13.833 8.15866 13.833 9.99988C13.833 11.8411 12.3406 13.3335 10.4999 13.3335Z"
                                                fill="#E4D4CF" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="ayur-footer-box">
                            <h4>Pages</h4>
                            <ul class="ayur-links">
                                <li><a href="{{ route('shippinganddelivery') }}">Shipping and Delivery
                                    </a></li>
                                <li><a href="{{ route('cancellationandrefund') }}">Cancellation and Refund
                                    </a></li>
                                <li><a href="{{ route('termandconditions') }}">Term and Conditions
                                    </a></li>
                                <li><a href="{{ route('privacypolicy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('faq') }}"> FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="ayur-footer-box">
                            <h4>Contact Info</h4>
                            <ul class="ayur-contact-list">
                                <li class="ayur-contact-box">
                                    <img src="../assets/images/location.png" alt="icon" />
                                    <p>Plot No.-1847, HSIIDC Rai, G. T. Karnal Road, Rai, Haryana 131029</p>
                                </li>
                                <li class="ayur-contact-box">
                                    <img src="../assets/images/mobile.png" alt="icon" />
                                    <p>+91-822285608, +91-8222856502</p>
                                </li>
                                <li class="ayur-contact-box">
                                    <img src="../assets/images/email.png" alt="icon" />
                                    <p>sukhdarshanpharmacy@gmail.com </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 px-0">
                        <div class="ayur-footer-box">
                            <h4>Recent Blog</h4>
                            <ul class="ayur-recent-blog">

                                @foreach ($recentBlogs as $blog)
                                    <li class="ayur-recentblog-box">
                                        <div class="ayur-recentblog-boximg">
                                            <img src="{{ asset($blog->blog_image) }}" alt="image">
                                        </div>
                                        <div class="ayur-recentblog-text">
                                            <p class="date">{{ $blog->created_at->format('F d, Y') }}</p>
                                            <h3 class="text">{{ $blog->blog_name }}
                                            </h3>
                                        </div>
                                    </li>
                                @endforeach

                                {{-- <li class="ayur-recentblog-box">
                                    <div class="ayur-recentblog-boximg">
                                        <img src="https://dummyimage.com/91x91/.png" alt="image">
                                    </div>
                                    <div class="ayur-recentblog-text">
                                        <p class="date">Jun 10,2024</p>
                                        <h3 class="text">Amet minim mollit non deserunt est sit Velit officia
                                            consequat.
                                        </h3>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="ayur-copyright-para">
                        <p>Copyright © 2024. All Right Reserved. Sukh Darshan</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-footer-bgshape">
            <img src="https://dummyimage.com/325x284/" alt="img" />
            <img src="../assets/images/footer-right.png" alt="img" />
        </div>
    </div>
    <!------------- footer Section end ----------->
    <!-- custom link  -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/swiper-bundle.min.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/SmoothScroll.min.js"></script>
    <script src="../assets/js/flatpickr.js"></script>
    <script src="../assets/js/vanilla-tilt.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/loginform.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ayur-tpor-click').click(function() {
                let productId = $(this).closest('.ayur-tpro-box').find('.add-to-cart-btn').data('id');

                $.ajax({
                    url: "/wishlist/add",
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        product_id: productId
                    },
                    success: function(response) {
                        alert("Added to wishlist!");
                    }
                });
            });
        });
    </script>

    <script>
        const popup = document.getElementById("popup");
        const close = document.getElementById("close");
        const videoPopup1 = document.getElementById("videoPopup1");

        popup.addEventListener("click", () => {
            videoPopup1.style.display = "block";
            $('body').css("overflow", "hidden");
        });
        close.addEventListener("click", () => {
            videoPopup1.style.display = "none";
            $('body').css("overflow", "auto");
        });
    </script>
</body>

</html>
