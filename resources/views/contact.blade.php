@extends('layouts/layout')
@section('page_title', 'Services')
@section('container')
    {{-- <div class="ayur-bread-section"> --}}

    <div class="ayur-bread-section"
        style="background-image: url('{{ asset('assets/images/contact1.png') }}'); background-repeat: no-repeat; background-size: cover; background-position: center; padding: 170px 0 100px;">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>Contact us</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="/"> Home</a>
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
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3492.037650718561!2d77.08937139999999!3d28.9269324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390db1bd0bab1a67%3A0xcba5960b29805a82!2sSukh%20Darshan%20Pharmacy!5e0!3m2!1sen!2sin!4v1744373465506!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="ayur-contact-pageinfo">
                    <div class="ayur-contact-heading">
                        <h3>Get in touch with us</h3>
                        <p>Get latest news in your inbox. Consectetur adipiscing elitadipiscing elitse ddo eiusmod tempor
                            incididunt ut labore et dolore.</p>
                    </div>
                    <div class="ayur-contact-form-wrapper">
                        <form method="POST" action="send-email" class="ayur-contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ayur-form-input">
                                        <input type="text" class="form-control require" name="first_name"
                                            placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ayur-form-input">
                                        <input type="text" class="form-control require" name="last_name"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ayur-form-input">
                                        <input type="email" class="form-control require" name="to"
                                            placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ayur-form-input">
                                        <input type="text" class="form-control require" name="subject"
                                            placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="ayur-form-input">
                                        <textarea name="message" cols="3" rows="8" class="form-control require" placeholder="Your Message..."
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="ayur-btn ayur-con-btn">Send Message</button>
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
