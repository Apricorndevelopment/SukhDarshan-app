<?php

namespace App\Http\Controllers;

use App\Models\Paymentgatway;

use Illuminate\Http\Request;
use App\Models\Companylogo;

class PaymentgatewayController extends Controller
{
    public function index()
    {

        $data = Paymentgatway::all();
        $logo = Companylogo::first();
        return view('admin.paymentgateway', compact('data', 'logo'));
    }



    public function companylogo()
    {
        $logo = Companylogo::first(); // Sirf ek logo hoga
        return view('admin.companylogo', compact('logo'));
    }

    public function updatecompanylogo(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logo = Companylogo::first();

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/logos'), $name);

            if ($logo) {
                // Pehle se logo hai toh update karenge
                $logo->update(['logo' => 'uploads/logos/' . $name]);
            } else {
                // Naya record banayenge
                Companylogo::create(['logo' => 'uploads/logos/' . $name]);
            }
        }

        return redirect()->back()->with('success', 'Logo updated successfully!');
    }
}
