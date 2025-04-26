<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Razorpay\Api\Api;
use App\Models\OrderItem;
use App\Models\Companylogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $logo = Companylogo::first();
        return view('admin.order', compact('orders', 'logo'));
    }
    public function orderaccepted()
    {
        $orderItems = OrderItem::where('status', 'Accepted')->paginate(10);
        $logo = Companylogo::first();
        return view('admin.orderaccepte', compact('orderItems', 'logo'));
    }
    public function orderpending()
    {
        $orderItems = OrderItem::where('status', 'Pending')->paginate(10);
        $logo = Companylogo::first();
        return view('admin.orderpending', compact('orderItems', 'logo'));
    }
    public function ordercancelled()
    {
        $orderItems = OrderItem::where('status', 'Cancelled')->paginate(10);
        $logo = Companylogo::first();
        return view('admin.ordercancelled', compact('orderItems', 'logo'));
    }

    public function orderitem()
    {
        $orderItems = OrderItem::with('product', 'order')->paginate(10); // assuming relationships
        $logo = Companylogo::first();
        return view('admin.orderitem', compact('orderItems', 'logo'));
    }

    public function updateOrderItemStatus(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->status = $request->input('status');
        $orderItem->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function deleteOrderItem($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return redirect()->back()->with('success', 'Order item deleted successfully!');
    }

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
