<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Blog;

class WishlistController extends Controller
{
    public function index()
    {
        $ip = request()->ip();
        $wishlistItems = Wishlist::with('product')->where('ip_address', $ip)->get();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('wishlist', compact('wishlistItems', 'recentBlogs'));
    }

    public function store(Request $request)
    {
        $ip = $request->ip();
        $productId = $request->product_id;

        if (!Wishlist::where('ip_address', $ip)->where('product_id', $productId)->exists()) {
            Wishlist::create([
                'ip_address' => $ip,
                'product_id' => $productId,
            ]);
        }

        return response()->json(['status' => 'added']);
    }

    public function destroy($id)
    {
        Wishlist::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Item removed from wishlist');
    }

    public function addToCart($id)
    {
        // Your logic to move to cart
        $wishlist = Wishlist::findOrFail($id);
        // Add to cart table (you must implement it)
        // Cart::create([...]);
        $wishlist->delete();

        return redirect()->back()->with('success', 'Item moved to cart');
    }
}
