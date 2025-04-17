@extends('layouts/layout')
@section('page_tile', 'About')
@section('container')

    <!------------- Breadcrumb Section start ----------->
    <div class="ayur-bread-section">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>About Us</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="/">Home</a>
                                </span>
                                <span class="ayur-active-page">About Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Breadcrumb Section end ----------->
    <!------------- About Section start ----------->
    <div class="ayur-bgcover ayur-about-sec ayur-inner-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-about-img">
                        {{-- src="https://dummyimage.com/561x348/.png" --}}
                        <img src="{{ asset('assets/images/ayurveda.jpeg') }}" style="width: 561px; height: 348px;"
                            alt="img" data-tilt data-tilt-max="10" data-tilt-speed="1000"
                            data-tilt-perspective="1000" />
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
                        <p>True wellness begins with balance—and nature provides the path. Through time-tested Ayurvedic
                            practices, mindful living, and natural remedies, you can restore harmony within your body and
                            mind. By aligning with nature’s rhythms, you support your body’s natural ability to heal,
                            energize, and thrive. Embrace a lifestyle that nurtures your well-being the natural way—for
                            health that’s lasting, balanced, and deeply rooted in tradition</p>
                        <a href="{{ route('about') }}" class="ayur-btn">Know More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-about-bgshape">
            <img src="assets/images/bg-shape2.png" alt="img" />
        </div>
    </div>
    <!------------- About Section end ----------->
    <!-------------Why choose Section start ----------->
    <div class="ayur-bgcover ayur-inner-whychoose">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap ayur-about-head">
                        <h5>Why Choose Us</h5>
                        <h3>Nature's secret for your truly health</h3>
                        <p>Discover the power of nature in nurturing your well-being. Our Ayurvedic products harness the
                            wisdom of ancient traditions, offering you a holistic approach to health. Experience the harmony
                            of natural ingredients that promote balance, vitality, and overall wellness.</p>
                        <div class="ayur-whycho-boxwrapper">
                            <div class="ayur-whycho-box">
                                <div class="ayur-whycho-boximg">
                                    <img src="assets/images/checkmark.png" alt="checkmark">
                                </div>
                                <div class="ayur-whycho-boxtext">
                                    <h3>100% Organic Herbal Products</h3>
                                    <p>Experience the purity of nature with our 100% organic herbal offerings. Each product
                                        is carefully crafted to ensure you receive the highest quality, free from harmful
                                        additives. Embrace the natural path to wellness and enjoy the benefits of holistic
                                        healing.</p>
                                </div>
                            </div>
                            <div class="ayur-whycho-box">
                                <div class="ayur-whycho-boximg">
                                    <img src="assets/images/checkmark.png" alt="checkmark">

                                </div>
                                <div class="ayur-whycho-boxtext">
                                    <h3>Expert Ayurvedic Therapists</h3>
                                    <p>Our team of professional therapists is dedicated to guiding you on your wellness
                                        journey. With extensive training in Ayurvedic practices, they provide personalized
                                        care tailored to your unique needs, ensuring a holistic approach to health and
                                        well-being.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-about-img">
                        <img src="{{ asset('assets/images/aboutmid.jpg') }}" style="width: 561px; height: 394px;"
                            alt="img" data-tilt data-tilt-max="8" data-tilt-speed="1000"
                            data-tilt-perspective="1000" />
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-about-bgshape">
            <img src="assets/images/bg-leaf2.png" alt="img" />
        </div>
    </div>
    <!-------------Why choose Section end ----------->
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
    <!------------- Why Section start ----------->
    <div class="ayur-bgcover ayur-why-sec ayur-why-single">
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
                                <h4>100% Organic</h4>
                                <p>Our products are crafted from 100% organic ingredients, ensuring that you receive the
                                    purest and most natural solutions for your health and wellness.</p>
                            </div>
                        </div>
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon2.png" alt="Best Quality Icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>Best Quality</h4>
                                <p>We prioritize excellence in every product, ensuring that you receive only the finest
                                    organic ingredients for your health and wellness.</p>
                            </div>
                        </div>
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon3.png" alt="Hygienic Product Icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>Hygienic Products</h4>
                                <p>Our products are manufactured under strict hygiene standards, guaranteeing safety and
                                    purity for your peace of mind.</p>
                            </div>
                        </div>
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon4.png" alt="Health Care Icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>Comprehensive Health Care</h4>
                                <p>Our holistic approach to health care combines traditional wisdom with modern practices,
                                    promoting overall well-being and vitality.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-why-textheading">
                        <h3>Harness the Power of Nature to Solve Your Health Problems</h3>
                        <p>Discover how nature's remedies can address your health concerns. Our Ayurvedic solutions are
                            designed to promote balance and well-being, utilizing the wisdom of ancient practices.
                            Experience the transformative effects of natural ingredients that work in harmony with your
                            body.</p>
                        <ul>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Personalized wellness solutions tailored to your needs.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Natural ingredients that support holistic health.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Expert guidance from trained Ayurvedic practitioners.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Commitment to quality and sustainability in every product.</p>
                            </li>
                        </ul>
                        <p>Join us on a journey to better health through the power of nature. Our products are crafted with
                            care, ensuring you receive the best that Ayurveda has to offer.</p>
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
                                    <iframe src="https://www.youtube.com/embed/_eq7kgVsliE" frameborder="0"
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

@endsection
