@extends('layouts/layout')
@section('page_tile', 'About')
@section('container')

    <!------------- Breadcrumb Section start ----------->
    {{-- <div class="ayur-bread-section"> --}}
    <div class="ayur-bread-section"
        style="background-image: url('{{ asset('assets/images/about12.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center; padding: 170px 0 100px; ">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>About Us</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="/" style="color: black;">Home</a>
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
                        <img src="{{ asset('assets/images/About us.jpg ') }}" style="width: 561px; height: 348px;"
                            alt="img" data-tilt data-tilt-max="10" data-tilt-speed="1000"
                            data-tilt-perspective="1000" />
                        <div class="ayur-about-exp">
                            {{-- <p>15</p>
                            <p>Years of Experience</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="ayur-heading-wrap ayur-about-head">
                        <h5>Who We Are</h5>
                        <h3>The Natural Way To Achieving Balance And Optimal Health</h3>
                        <p>At Sukhdarshan Pharmacy., we are passionate about restoring health through the timeless
                            science of Ayurveda. Established in 2011, we are an ISO 9001:2015 certified Ayurvedic
                            manufacturing company based in Rai Industrial Area, Sonipat, Haryana. With a commitment to
                            quality, purity, and authenticity, we offer a wide range of Ayurvedic and herbal healthcare
                            products designed to support holistic well-being.

                            Over the years, we’ve earned the trust of thousands of customers by consistently delivering
                            safe, natural, and effective remedies rooted in traditional Indian medicine. Our in-house R&D
                            team, modern manufacturing facility, and adherence to GMP standards ensure that every product we
                            create meets the highest quality benchmarks.

                            We believe in the power of nature to heal, and it is our mission to make that power accessible
                            to every household.</p>
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
                        <h5>Why Choose Sukhdarshan Pharmacy</h5>
                        <h3>Ancient Ayurveda for Modern Wellness</h3>
                        <p>Sukhdarshan Pharmacy . is committed to promoting natural healing through the timeless
                            science of Ayurveda. Our carefully formulated herbal products are designed to restore balance,
                            enhance vitality, and nurture your overall well-being — naturally and effectively.</p>
                        <div class="ayur-whycho-boxwrapper">
                            <div class="ayur-whycho-box">
                                <div class="ayur-whycho-boximg">
                                    <img src="assets/images/checkmark.png" alt="checkmark">
                                </div>
                                <div class="ayur-whycho-boxtext">
                                    <h3>100% Ayurvedic & Natural Ingredients</h3>
                                    <p>We use only the purest herbs and natural extracts, ensuring every product supports
                                        your health without side effects. No chemicals, no compromises — just nature’s best.
                                    </p>
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
                        <img src="{{ asset('assets/images/about.png') }}" style="width: 561px; height: 394px;"
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
                                <h2 class="ayur-counting" data-to="15">15</h2>
                                <p>Years Experience</p>
                            </div>
                        </div>
                        <div class="ayur-achieve-box">
                            <div class="ayur-achieve-icon">
                                <img src="assets/images/achieve-icon2.png" alt="icon">
                            </div>
                            <div class="ayur-achieve-text">
                                <h2 class="ayur-counting" data-to="1000">1000+</h2>
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
                                <p>our products are made with ingredients grown without synthetic pesticides.</p>
                            </div>
                        </div>
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon2.png" alt="Best Quality Icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>Best Quality</h4>
                                <p>Most natural products—crafted with care, backed by tradition, and trusted for their
                                    purity.</p>
                            </div>
                        </div>
                        <div class="ayur-why-box">
                            <div class="ayur-why-boxicon">
                                <img src="assets/images/why-icon3.png" alt="Hygienic Product Icon" />
                            </div>
                            <div class="ayur-why-boxtext">
                                <h4>Hygienic Products</h4>
                                <p>Stay protected with our hygienic products, designed to promote cleanliness.</p>
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
                        <h3>Solve Your Problem with The Power of Nature</h3>
                        <p>
                            At Sukhdarshan Pharmacy Pvt. Ltd., we are passionate about restoring health through the timeless
                            science of Ayurveda. Established in 2011, we are an ISO 9001:2015 certified Ayurvedic
                            manufacturing
                            company based in Rai Industrial Area, Sonipat, Haryana. With a commitment to quality, purity,
                            and
                            authenticity, we offer a wide range of Ayurvedic and herbal healthcare products designed to
                            support
                            holistic well-being.</p>
                        <ul>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Drawn from nature to help you.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Pure & Natural Our products are made.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Experienced Team We are guided.</p>
                            </li>
                            <li>
                                <img src="assets/images/tick.png" alt="icon">
                                <p>Customer-Centric Approach.</p>
                            </li>
                        </ul>
                        <p>Join us on a journey to better health through the power of nature. Our products are crafted with
                            care, ensuring you receive the best that Sukhdarshan Pharmacy has to offer.</p>
                        <div class="ayur-why-btn">
                            <a href="{{ route('about') }}" class="ayur-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-why-bgshape">
            <img src="assets/images/bg-shape4.png" alt="img" />
            <img src="assets/images/bg-leaf4.png" alt="img" />
        </div>
    </div>

@endsection
