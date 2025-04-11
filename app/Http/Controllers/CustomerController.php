<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $result['data'] = USer::all();
        return view('admin/customer', $result);
    }

    public function show(Request $request, $id = '')
    {

        $arr = User::where(['id' => $id])->get();
        $result['customer_list'] = $arr['0'];
        // print_r($result['customer']);

        return view('admin/show_customer', $result);
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
