@extends('layouts/layout')
@section('page_title', 'Blog')
@section('container')


    {{-- <div class="ayur-bread-section"> --}}
    <div class="ayur-bread-section"
        style="background-image: url('{{ asset('assets/images/about1.png') }}'); background-repeat: no-repeat; background-size: cover; background-position: center; padding: 170px 0 100px; ">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>Blog</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="/">Home</a>
                                </span>
                                <span class="ayur-active-page">Blog</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Breadcrumb Section end ----------->
    <!------------- Blog single page Section start ----------->
    <div class="ayur-bgcover ayur-blog-sec ayur-blogsin-page">
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

                @foreach ($data as $list)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="ayur-blog-box">
                            <div class="ayur-blog-img">
                                <img src="{{ asset($list->blog_image) }}" alt="image">
                            </div>
                            <div class="ayur-blog-text">
                                <div class="ayur-blog-date">
                                    <h4>{{ $list->blog_type }}</h4>
                                    <p>{{ $list->created_at->format('F d, Y') }}</p>
                                </div>
                                <h3><a href="{{ url('/blog/' . $list->blog_slug) }}">{{ $list->blog_name }}</a></h3>
                                <p>{{ $list->blog_shortdesc }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <div class="row">

            </div>
        </div>
        <div class="ayur-bgshape ayur-blog-bgshape">
            <img src="assets/images/bg-shape6.png" alt="img" />
            <img src="assets/images/bg-leaf6.png" alt="img" />
        </div>
    </div>
    <!------------- Blog single page Section end ----------->
    <!------------- Video Section start ----------->
    {{-- <div class="ayur-bgcover ayur-videosin-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
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
                </div>
            </div>
        </div>
    </div> --}}
@endsection
