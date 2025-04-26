<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Companylogo;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {

        $data = SubCategory::all();
        $logo = Companylogo::first();

        return view('admin.subcategory', compact('data', 'logo'));
    }



    public function manage_subcategory(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = SubCategory::where(['id' => $id])->get();

            $result['subcategory_name'] = $arr[0]->subcategory_name;
            $result['subcategory_slug'] = $arr[0]->subcategory_slug;
            $result['category_id'] = $arr[0]->category_id;
            $result['subcategory_image'] = $arr[0]->subcategory_image;
            $result['id'] = $arr[0]->id;
        } else {
            $result['subcategory_name'] = '';
            $result['subcategory_slug'] = '';
            $result['category_id'] = '';
            $result['subcategory_image'] = '';
            $result['id'] = 0;
        }

        $result['sub_categories_from_categories'] = Category::all();
        // $logo = Companylogo::first();

        return view('admin/manage_subcategory', $result);
    }

    public function manage_subcategory_process(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'subcategory_slug' => 'required|unique:categories,category_slug,' . $request->post('id'),
            'subcategory_image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($request->post('id') > 0) {
            $model = SubCategory::find($request->post('id'));
            $msg = "SubCategory updated";
        } else {
            $model = new SubCategory();
            $msg = "SubCategory inserted";
        }



        $model->subcategory_name = $request->post('subcategory_name');
        $model->subcategory_slug = $request->post('subcategory_slug');
        $model->category_id = $request->post('category_id');
        $model->status = 1;


        if ($request->hasFile('subcategory_image')) {
            $image = $request->file('subcategory_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/subcategory'), $image_name);
            $model->subcategory_image = 'uploads/subcategory/' . $image_name;
        }
        $model->save();
        return redirect('admin/subcategory')->with('message', $msg);
    }

    public function delete(Request $request, $id)
    {
        $model = SubCategory::find($id);
        if ($model) {
            $model->delete();
        }
        return redirect('admin/subcategory')->with('message', 'SubCategory deleted');
    }

    public function status(Request $request, $status, $id)
    {
        $model = SubCategory::find($id);
        if ($model) {
            $model->status = $status;
            $model->save();
        }
        return redirect('admin/subcategory')->with('message', 'SubCategory status updated');
    }
}
