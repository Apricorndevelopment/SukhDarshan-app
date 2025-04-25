<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $image_name);
            $user->profile_image = 'uploads/profiles/' . $image_name;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function myOrders()
    {
        $user = Auth::user(); // OR auth()->user()

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $orders = Order::with('items.product')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.orders', compact('orders'));
    }

    public function myInvoices()
    {
        $user = Auth::user();

        $invoices = Invoice::with('order')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('user.invoices.index', compact('invoices'));
    }
}
