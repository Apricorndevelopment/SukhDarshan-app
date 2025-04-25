<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cartItems', 'totalAmount'));
    }

    // public function placeOrder(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'billing_address' => 'required',
    //         'city' => 'required',
    //         'region' => 'required',
    //         'zip' => 'required',
    //         'contact' => 'required',
    //         'shipping_state' => 'required',
    //         'shipping_zip' => 'required',
    //         'shipping_country' => 'required',
    //     ]);

    //     $cartItems = session()->get('cart', []);
    //     if (empty($cartItems)) {
    //         return response()->json(['error' => 'Cart is empty'], 400);
    //     }

    //     $totalAmount = 0;
    //     foreach ($cartItems as $item) {
    //         $totalAmount += $item['price'] * $item['quantity'];
    //     }

    //     $order = Order::create([
    //         'user_id' => Auth::id(),
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'billing_address' => $request->billing_address,
    //         'city' => $request->city,
    //         'region' => $request->region,
    //         'zip' => $request->zip,
    //         'contact' => $request->contact,
    //         'shipping_state' => $request->shipping_state,
    //         'shipping_zip' => $request->shipping_zip,
    //         'shipping_country' => $request->shipping_country,
    //         'total_amount' => $totalAmount,
    //         'payment_status' => 'pending',
    //         'payment_method' => 'razorpay'
    //     ]);

    //     foreach ($cartItems as $item) {
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $item['id'],
    //             'quantity' => $item['quantity'],
    //             'price' => $item['price']
    //         ]);
    //     }

    //     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    //     $razorpayOrder = $api->order->create([
    //         'receipt' => 'order_' . $order->id,
    //         'amount' => $totalAmount * 100, // in paise
    //         'currency' => 'INR',
    //         'payment_capture' => 1
    //     ]);

    //     $order->razorpay_order_id = $razorpayOrder['id'];
    //     $order->save();

    //     return response()->json([
    //         'razorpay_order_id' => $razorpayOrder['id'],
    //         'amount' => $razorpayOrder['amount'],
    //         'order_id' => $order->id,
    //         'user_name' => $order->first_name . ' ' . $order->last_name,
    //         'email' => Auth::user()->email,
    //         'contact' => $order->contact
    //     ]);
    // }
    public function placeOrder(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'billing_address' => 'required',
            'city' => 'required',
            'region' => 'required',
            'zip' => 'required',
            'contact' => 'required',
            'shipping_state' => 'required',
            'shipping_zip' => 'required',
            'shipping_country' => 'required',
        ]);

        $cartItems = session()->get('cart', []);
        if (empty($cartItems)) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }

        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'billing_address' => $request->billing_address,
            'city' => $request->city,
            'region' => $request->region,
            'zip' => $request->zip,
            'contact' => $request->contact,
            'shipping_state' => $request->shipping_state,
            'shipping_zip' => $request->shipping_zip,
            'shipping_country' => $request->shipping_country,
            'country' => $request->country,
            'total_amount' => $totalAmount,
            'payment_status' => 'pending',
            'payment_method' => 'razorpay'
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            $razorpayOrder = $api->order->create([
                'receipt' => 'order_' . $order->id,
                'amount' => $totalAmount * 100, // in paise
                'currency' => 'INR',
                'payment_capture' => 1
            ]);

            $order->razorpay_order_id = $razorpayOrder['id'];
            $order->save();

            return response()->json([
                'razorpay_order_id' => $razorpayOrder['id'],
                'amount' => $razorpayOrder['amount'],
                'order_id' => $order->id,
                'user_name' => $order->first_name . ' ' . $order->last_name,
                'email' => Auth::check() ? Auth::user()->email : null,
                'contact' => $order->contact
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create Razorpay order.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function paymentSuccess(Request $request)
    {
        $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->first();

        if ($order) {
            $order->payment_status = 'paid';
            $order->razorpay_payment_id = $request->razorpay_payment_id;
            $order->razorpay_signature = $request->razorpay_signature;
            $order->save();

            session()->forget('cart');

            return response()->json(['message' => 'Payment successful.']);
        }

        return response()->json(['error' => 'Order not found.'], 404);
    }
}
