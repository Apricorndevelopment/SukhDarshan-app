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
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-pagination-wrappper">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">
                                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.930801 5.93376L6.42152 0.443038C7.01224 -0.147679 7.96624 -0.147679 8.55696 0.443038C9.14768 1.03376 9.14768 1.98776 8.55696 2.57848L4.13249 7L8.55696 11.4215C9.14768 12.0122 9.14768 12.9662 8.55696 13.557C7.96624 14.1477 7.01224 14.1477 6.42152 13.557L0.930801 8.06625C0.343038 7.47848 0.343038 6.52152 0.930801 5.93376Z"
                                                fill="white" />
                                        </svg>
                                    </a></li>
                                <li class="page-item"><a class="page-link active" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">
                                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.0692 5.93376L2.57848 0.443038C1.98776 -0.147679 1.03376 -0.147679 0.443038 0.443038C-0.147679 1.03376 -0.147679 1.98776 0.443038 2.57848L4.86751 7L0.443038 11.4215C-0.147679 12.0122 -0.147679 12.9662 0.443038 13.557C1.03376 14.1477 1.98776 14.1477 2.57848 13.557L8.0692 8.06625C8.65696 7.47848 8.65696 6.52152 8.0692 5.93376Z"
                                                fill="white" />
                                        </svg>
                                    </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayur-bgshape ayur-blog-bgshape">
            <img src="assets/images/bg-shape6.png" alt="img" />
            <img src="assets/images/bg-leaf6.png" alt="img" />
        </div>
    </div>
    <!------------- Blog single page Section end ----------->
    <!------------- Video Section start ----------->
    <div class="ayur-bgcover ayur-videosin-sec">
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
    </div>
@endsection
