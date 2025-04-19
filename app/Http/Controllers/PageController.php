<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function about()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('about', compact('recentBlogs'));
    }

    public function shop()
    {

        $data = Product::all();
        $is_trending = Product::where('is_trending', 1)->get();
        // $recentproduct = Product::orderBy('created_at', 'desc')->take(3)->get();
        $is_promo = Product::where('is_promo', 1)->take(4)->get();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('shop', compact('data', 'recentBlogs', 'is_trending', 'is_promo'));
    }

    public function services()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('services', compact('recentBlogs'));
    }

    public function blog()
    {
        $data  = Blog::all();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('blog', compact('data', 'recentBlogs'));
    }

    public function blogdetails()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('blogdetails', 'recentBlogs');
    }

    public function contact()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('contact', compact('recentBlogs'));
    }

    public function cart()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('cart', compact('recentBlogs'));
    }

    public function shippinganddelivery()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('shippinganddelivery', compact('recentBlogs'));
    }

    public function cancellationandrefund()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('cancellationandrefund', compact('recentBlogs'));
    }

    public function termandconditions()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('termandconditions', compact('recentBlogs'));
    }

    public function privacypolicy()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('privacypolicy', compact('recentBlogs'));
    }

    public function faq()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('faq', compact('recentBlogs'));
    }

    public function wishlist()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('wishlist', compact('recentBlogs'));
    }

    public function checkout()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('checkout', compact('recentBlogs'));
    }
}
