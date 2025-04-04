@extends('layouts/layout')
@section('page_title', 'Services')
@section('container')
    <div class="ayur-bread-section">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>Contact us</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="index.html">Home</a>
                                </span>
                                <span class="ayur-active-page">Contact</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Breadcrumb Section end ----------->
    <!------------- Contact page Section start ----------->
    <div class="ayur-bgcover ayur-contactpage-wrapper">
        <div class="container">
            <div class="ayur-contactpage-box">
                <div class="ayur-contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889"
                        allowfullscreen></iframe>
                </div>
                <div class="ayur-contact-pageinfo">
                    <div class="ayur-contact-heading">
                        <h3>Get in touch with us</h3>
                        <p>Get latest news in your inbox. Consectetur adipiscing elitadipiscing elitse ddo eiusmod tempor
                            incididunt ut labore et dolore.</p>
                    </div>
                    <div class="ayur-contact-form-wrapper">
                        <form method="" class="ayur-contact-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ayur-form-input">
                                        <input type="text" class="form-control require" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ayur-form-input">
                                        <input type="text" class="form-control require" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ayur-form-input">
                                        <input type="text" class="form-control require" name="email"
                                            placeholder="Your Email" data-valid="email" data-error="Email should be valid.">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ayur-form-input">
                                        <input type="text" class="form-control require" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="ayur-form-input">
                                        <textarea name="your-message" cols="3" rows="8" class="form-control require" placeholder="Your Message..."></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="button" class="ayur-btn ayur-con-btn submitForm">Send Message</button>
                                    <div class="response"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
