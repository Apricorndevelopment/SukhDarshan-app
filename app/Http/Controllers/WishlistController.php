<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Companylogo;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $ip = request()->ip();
        $wishlistItems = Wishlist::with('product.firstVariant')->where('ip_address', $ip)->get();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('wishlist', compact('wishlistItems', 'recentBlogs', 'logo'));
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



    public function addToCart(Request $request)
    {
        $wishlist = Wishlist::with('product.firstVariant')->findOrFail($request->id);
        $product = $wishlist->product;

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found.']);
        }

        $cart = session()->get('cart', []);
        $variantId = $request->variant_id ?? null;
        $key = $variantId ? $product->id . '_' . $variantId : $product->id;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += (int) $request->quantity;
        } else {
            $cart[$key] = [
                'name' => $product->product_name,
                'quantity' => (int) $request->quantity,
                // 'price' => $product->price,
                'price' => optional($product->firstVariant)->price ?? $product->price,
                'image' => $product->product_image,
                'variant_id' => $variantId
            ];
        }

        session()->put('cart', $cart);

        $wishlist->delete();

        return response()->json(['status' => 'success', 'message' => 'Added to cart & removed from wishlist.']);
    }
}
