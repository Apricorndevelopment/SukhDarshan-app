<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Razorpay\Api\Api;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user->id,
            'billing_address' => $request->billing_address,
            'shipping_address' => $request->shipping_address,
            'total_amount' => 1000, // calculate from cart session
            'status' => 'pending',
        ]);

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $razorpayOrder = $api->order->create([
            'receipt' => 'rcptid_' . $order->id,
            'amount' => 1000 * 100,
            'currency' => 'INR',
        ]);

        $order->razorpay_order_id = $razorpayOrder['id'];
        $order->save();

        return response()->json([
            'razorpay_order_id' => $razorpayOrder['id'],
            'amount' => 1000 * 100,
            'user_name' => $user->name,
            'email' => $user->email,
            'contact' => $request->contact,
        ]);
    }

    public function paymentSuccess(Request $request)
    {
        $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->first();

        if ($order) {
            $order->update([
                'payment_id' => $request->razorpay_payment_id,
                'status' => 'paid',
            ]);
        }

        return response()->json(['success' => true]);
    }
}
