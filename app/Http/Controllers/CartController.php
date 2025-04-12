<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        // Check if the user is logged in, otherwise redirect to login page
        if (!Auth::check()) {
            return redirect()->route('Auth.login');  // Redirecting to the login route
        }

        // Proceed with adding the product to the cart
        $productId = $request->input('product_id');

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        // Redirect to the cart page after adding the item
        return redirect()->route('show.cart')->with('success', 'Product added to cart');
    }


    public function showCart()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('cart', compact('cartItems'));
    }

    public function removeItem(Request $request)
    {
        Cart::where('id', $request->input('cart_id'))->delete();
        return back()->with('success', 'Item removed');
    }

    public function updateCart(Request $request)
    {
        foreach ($request->quantities as $cartId => $quantity) {
            Cart::where('id', $cartId)->update(['quantity' => $quantity]);
        }

        return back()->with('success', 'Cart updated');
    }
}
