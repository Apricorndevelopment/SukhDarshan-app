<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Companylogo;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $result['data'] = USer::all();
        $logo = Companylogo::first();
        return view('admin/customer', compact('result', 'logo'));
    }

    public function show(Request $request, $id = '')
    {

        $arr = User::where(['id' => $id])->get();
        $result['customer_list'] = $arr['0'];
        $logo = Companylogo::first();
        // print_r($result['customer']);

        return view('admin/show_customer', compact('result', 'logo'));
    }

    public function status(Request $request, $status, $id)
    {
        $model = user::find($id);
        $model->status = $status;
        $model->save();
        // $request->session()->flash('message','Category deleted');
        return redirect('admin/customer');
    }
}
