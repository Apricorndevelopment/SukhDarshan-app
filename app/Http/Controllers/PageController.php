<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\Companylogo;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function about()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('about', compact('recentBlogs', 'logo'));
    }


    public function shop()
    {
        $data = Product::with('firstVariant')->paginate(6);
        $is_trending = Product::with('firstVariant')->where('is_trending', 1)->paginate(4);
        $is_promo = Product::with('firstVariant')->where('is_promo', 1)->take(4)->get();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        $subcategory = SubCategory::all();

        return view('shop', compact('subcategory', 'data', 'logo', 'recentBlogs', 'is_trending', 'is_promo'));
    }

    public function services()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('services', compact('recentBlogs', 'logo'));
    }

    public function blog()
    {
        $data  = Blog::all();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('blog', compact('data', 'recentBlogs', 'logo'));
    }

    public function blogdetails()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('blogdetails', compact('recentBlogs', 'logo'));
    }

    public function contact()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('contact', compact('recentBlogs', 'logo'));
    }

    public function cart()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('cart', compact('recentBlogs', 'logo'));
    }

    public function shippinganddelivery()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('shippinganddelivery', compact('recentBlogs', 'logo'));
    }

    public function cancellationandrefund()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('cancellationandrefund', compact('recentBlogs', 'logo'));
    }

    public function termandconditions()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('termandconditions', compact('recentBlogs', 'logo'));
    }

    public function privacypolicy()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('privacypolicy', compact('recentBlogs', 'logo'));
    }

    public function faq()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('faq', compact('recentBlogs', 'logo'));
    }

    public function wishlist()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('wishlist', compact('recentBlogs', 'logo'));
    }

    public function checkout()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('checkout', compact('recentBlogs', 'logo'));
    }
}
