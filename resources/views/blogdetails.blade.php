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
                            <h2>Blog single</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="/">Home</a>
                                </span>
                                <span class=""><a href="{{ route('blog') }}">Blog</a></span>
                                <span class="ayur-active-page">Blog-Deatils</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Breadcrumb Section end ----------->
    <!------------- Blogsingle page Section start ----------->
    <div class="ayur-bgcover ayur-blogsin-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="ayur-blogsingle-sec">
                        <div class="ayur-blogsingle-imgsec">
                            <div class="ayur-blog-img">
                                <img src="{{ asset($blog->blog_image) }}" alt="{{ $blog->blog_name }}" ">
                                        </div>

                                                    @foreach ($recentBlogs as $recent)
                                <div class="ayur-blog-box ayur-blog-inline">
                                    <div class="ayur-blog-img">
                                        <img src="{{ asset($recent->blog_image) }}" alt="{{ $recent->blog_name }}"
                                            style="width: 91px; height: 91px; object-fit: cover;">
                                    </div>
                                    <div class="ayur-blog-text">
                                        <div class="ayur-blog-date">
                                            <h4>{{ $recent->blog_type }}</h4>
                                        </div>
                                        <h3>
                                            <a href="{{ url('/blog/' . $recent->blog_slug) }}">
                                                {{ Str::limit($recent->blog_name, 40) }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ayur-bgshape ayur-trenpro-bgshape ayur-blog-single-bgshape">
                <img src="assets/images/bg-shape3.png" alt="img" />
                <img src="assets/images/bg-leaf2.png" alt="img" />
            </div>
        </div>


    @endsection
