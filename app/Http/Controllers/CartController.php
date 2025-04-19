<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('carthome', compact('cartItems', 'recentBlogs'));
    }

    // public function addToCart(Request $request)
    // {
    //     $product = Product::findOrFail($request->product_id);

    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$product->id])) {
    //         $cart[$product->id]['quantity']++;
    //     } else {
    //         $cart[$product->id] = [
    //             "product_id" => $product->id,
    //             "name" => $product->product_name,
    //             "price" => $product->price,
    //             "image" => $product->product_image,
    //             "quantity" => 1
    //         ];
    //     }

    //     session()->put('cart', $cart);

    //     return response()->json(['message' => 'Added to cart', 'cart' => $cart]);
    // }
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = (int) $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "serial" => count($cart) + 1, // 👈 Serial number
                "product_id" => $product->id,
                "name" => $product->product_name,
                "price" => $product->price,
                "image" => $product->product_image,
                "quantity" => $quantity
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Added to cart', 'cart' => $cart]);
    }

    public function viewCart()
    {
        $cartItems = session('cart', []);
        return view('cart', compact('cartItems'));
    }

    public function updateCart(Request $request)
    {
        $quantities = $request->quantities;
        $cart = session()->get('cart', []);

        foreach ($quantities as $productId => $qty) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $qty;
            }
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated');
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        unset($cart[$productId]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product removed');
    }
}
