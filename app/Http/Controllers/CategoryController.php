<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use App\Models\Companylogo;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function home()
    // {
    //     return view('admin.category');
    // }


    public function index()
    {
        $result['data'] = Category::all();
        // $logo = Companylogo::first();
        // return view('admin/category', compact('result', 'logo'));
        return view('admin/category', $result);
    }

    public function manage_category(Request $request, $id = '')
    {
        if ($id > 0) {
            $category = Category::findOrFail($id);
            $result = $category->toArray(); // Ensure it's an array
        } else {
            $result = [
                'category_name' => '',
                'category_slug' => '',
                'category_image' => '',
                'id' => 0
            ];
            $category = new Category();
        }

        $result['category'] = $category; // Pass the object separately
        // $logo = Companylogo::first();
        return view('admin/manage_category', $result);
    }

    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $request->post('id'),
            'category_image' => 'mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        if ($request->post('id') > 0) {
            $model = Category::findOrFail($request->post('id'));
            $msg = "Category updated";
        } else {
            $model = new Category();
            $msg = "Category inserted";
        }

        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        $model->status = 1;

        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/category'), $image_name);
            $model->category_image = 'uploads/category/' . $image_name;
        }

        $model->save();
        return redirect('admin/category')->with('success', $msg);
    }

    public function delete(Request $request, $id)
    {
        Category::findOrFail($id)->delete();
        return redirect('admin/category')->with('success', 'Category deleted');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Category::findOrFail($id);
        $model->status = $status;
        $model->save();
        return redirect('admin/category')->with('success', 'Status updated');
    }
}
