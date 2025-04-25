<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;
use App\Models\ProductVariant;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('carthome', compact('cartItems', 'recentBlogs'));
    }
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = (int) $request->input('quantity', 1);
        $variantId = $request->input('variant_id');

        $price = $product->price;
        $sku = $product->sku;
        $variantName = null;

        // If variant is selected
        if ($variantId) {
            $variant = ProductVariant::find($variantId);
            if ($variant) {
                $price = $variant->price;
                $sku = $variant->sku;
                $variantName = $variant->variant ?? null;
            }
        }

        $cart = session()->get('cart', []);

        // Use a unique key for product+variant to avoid conflicts
        $cartKey = $product->id . '_' . ($variantId ?? '0');

        if (isset($cart[$cartKey])) {
            $existingQty = is_numeric($cart[$cartKey]['quantity']) ? (int)$cart[$cartKey]['quantity'] : 0;
            $cart[$cartKey]['quantity'] = $existingQty + $quantity;
        } else {
            $cart[$cartKey] = [
                "serial" => count($cart) + 1,
                "product_id" => $product->id,
                "variant_id" => $variantId,
                "variant_name" => $variantName ?? '',
                "name" => $product->product_name,
                "price" => $price,
                "sku" => $sku,
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

        foreach ($quantities as $cartKey => $qty) {
            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] = (int) $qty;
            }
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated');
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $cartKey = $request->input('cart_key');

        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed');
    }
}
