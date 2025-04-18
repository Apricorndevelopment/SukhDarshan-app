<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result['data'] = Product::paginate(10);
        return view('admin.product', $result);
    }

    public function manage_product(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Product::where(['id' => $id])->get();
            $result['product_name'] = $arr[0]->product_name;
            $result['product_slug'] = $arr[0]->product_slug;
            $result['sku'] = $arr[0]->sku;
            $result['product_image'] = $arr[0]->product_image;
            $result['subcategory_id'] = $arr[0]->subcategory_id;
            $result['product_shortdesc'] = $arr[0]->product_shortdesc;
            $result['product_desc'] = $arr[0]->product_desc; // ✅ fixed typo
            $result['technical_specification'] = $arr[0]->technical_specification;
            $result['price'] = $arr[0]->price;
            $result['mrp'] = $arr[0]->mrp;
            $result['keyword'] = $arr[0]->keyword;
            $result['is_trending'] = $arr[0]->is_trending;
            $result['is_promo'] = $arr[0]->is_promo;
            $result['is_top'] = $arr[0]->is_top;
            $result['tax'] = $arr[0]->tax;
            $result['status'] = $arr[0]->status;
            $result['id'] = $arr[0]->id;

            // ✅ Load multiple images for preview
            $result['product_images'] = ProductImage::where('product_id', $id)->get();
        } else {
            $result = [
                'product_name' => '',
                'product_slug' => '',
                'sku' => '',
                'product_image' => '',
                'subcategory_id' => '',
                'product_shortdesc' => '',
                'product_desc' => '',
                'technical_specification' => '',
                'price' => '',
                'mrp' => '',
                'keyword' => '',
                'is_trending' => '',
                'is_promo' => '',
                'is_top' => '',
                'tax' => '',
                'status' => '',
                'id' => '',
                'product_images' => [],
            ];
        }

        $result['subcategory'] = DB::table('sub_categories')->where(['status' => 1])->get();

        return view('admin/manage_product', $result);
    }
    // Add at the top of your controller

    public function manage_product_process(Request $request)
    {
        if ($request->post('id') > 0) {
            $image_validation = "mimes:jpeg,jpg,png,tif,avif,webp";
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png,tif,avif,webp";
        }

        $request->validate([
            'product_name' => 'required',
            'product_slug' => 'required|unique:products,product_slug,' . $request->post('id'),
            'product_image' => $image_validation,
            'images.*' => 'mimes:jpeg,jpg,png,tif,avif,webp'
        ]);

        if ($request->post('id') > 0) {
            $model = Product::find($request->post('id'));
            $msg = "Product updated";
        } else {
            $model = new Product();
            $msg = "Product inserted";
        }

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $image_name);
            $model->product_image = 'uploads/products/' . $image_name;
        }

        $model->subcategory_id = $request->post('subcategory_id');
        $model->product_name = $request->post('product_name');
        $model->product_slug = $request->post('product_slug');
        $model->sku = $request->post('sku');
        $model->product_shortdesc = $request->post('product_shortdesc');
        $model->product_desc = $request->post('product_desc'); // ✅ use correct field
        $model->technical_specification = $request->post('technical_specification');
        $model->price = $request->post('price');
        $model->mrp = $request->post('mrp');
        $model->keyword = $request->post('keyword');
        $model->is_trending = $request->post('is_trending');
        $model->is_promo = $request->post('is_promo');
        $model->is_top = $request->post('is_top');
        $model->tax = $request->post('tax');
        $model->status = 1;
        $model->save();

        // ✅ Handle multiple images properly
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = uniqid() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $image_name);

                ProductImage::create([
                    'product_id' => $model->id,
                    'product_name' => $model->product_name,
                    'image_path' => 'uploads/products/' . $image_name,
                ]);
            }
        }

        session()->flash('message', $msg);
        return redirect('admin/product');
    }

    // public function manage_product(Request $request, $id = '')
    // {
    //     if ($id > 0) {
    //         $arr = Product::where(['id' => $id])->get();
    //         $result['product_name'] = $arr['0']->product_name;
    //         $result['product_slug'] = $arr['0']->product_slug;
    //         $result['sku'] = $arr['0']->sku;
    //         $result['product_image'] = $arr['0']->product_image;
    //         $result['subcategory_id'] = $arr['0']->subcategory_id;
    //         $result['product_shortdesc'] = $arr['0']->product_shortdesc;
    //         $result['product_desc'] = $arr['0']->product_desc;
    //         $result['technical_specification'] = $arr['0']->technical_specification;
    //         $result['price'] = $arr['0']->price;
    //         $result['mrp'] = $arr['0']->mrp;
    //         $result['keyword'] = $arr['0']->keyword;
    //         $result['is_trending'] = $arr['0']->is_trending;
    //         $result['is_promo'] = $arr['0']->is_promo;
    //         $result['is_top'] = $arr['0']->is_top;
    //         $result['tax'] = $arr['0']->tax;
    //         $result['status'] = $arr['0']->status;
    //         $result['id'] = $arr['0']->id;
    //         $result['product_images'] = ProductImage::where('product_id', $id)->get();
    //     } else {

    //         $result['product_name'] = '';
    //         $result['product_slug'] = '';
    //         $result['sku'] = '';
    //         $result['product_image'] = '';
    //         $result['subcategory_id'] = '';
    //         $result['product_shortdesc'] = '';
    //         $result['product_desc'] = '';
    //         $result['technical_specification'] = '';
    //         $result['price'] = '';
    //         $result['mrp'] = '';
    //         $result['keyword'] = '';
    //         $result['is_trending'] = '';
    //         $result['is_promo'] = '';
    //         $result['is_top'] = '';
    //         $result['tax'] = '';
    //         $result['status'] = '';
    //         $result['id'] = '';
    //     }
    //     $result['subcategory'] = DB::table('sub_categories')->where(['status' => 1])->get();

    //     return view('admin/manage_product', $result);
    // }


    // public function manage_product_process(Request $request)
    // {
    //     // Validate the incoming request
    //     if ($request->post('id') > 0) {
    //         $image_validation = "mimes:jpeg,jpg,png,tif,avif,webp";
    //     } else {
    //         $image_validation = "required|mimes:jpeg,jpg,png,tif,avif,webp";
    //     }

    //     $request->validate([
    //         'product_name' => 'required',
    //         'product_slug' => 'required|unique:products,product_slug,' . $request->post('id'),
    //         'product_image' => $image_validation,
    //         'images.*' => 'mimes:jpeg,jpg,png,tif,avif,webp' // Validation for multiple images
    //     ]);

    //     // Handle Product creation or update
    //     if ($request->post('id') > 0) {
    //         $model = Product::find($request->post('id'));
    //         $msg = "Product updated";
    //     } else {
    //         $model = new Product();
    //         $msg = "Product inserted";
    //     }

    //     // Handle the main product image
    //     if ($request->hasFile('product_image')) {
    //         $image = $request->file('product_image');
    //         $image_name = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('uploads/products'), $image_name);
    //         $model->product_image = 'uploads/products/' . $image_name;
    //     }

    //     // Save other product details
    //     $model->subcategory_id = $request->post('subcategory_id');
    //     $model->product_name = $request->post('product_name');
    //     $model->product_slug = $request->post('product_slug');
    //     $model->sku = $request->post('sku');
    //     $model->product_shortdesc = $request->post('product_shortdesc');
    //     $model->prodcut_desc = $request->post('product_desc'); // typo from DB kept as-is
    //     $model->technical_specification = $request->post('technical_specification');
    //     $model->price = $request->post('price');
    //     $model->mrp = $request->post('mrp');
    //     $model->keyword = $request->post('keyword');
    //     $model->is_trending = $request->post('is_trending');
    //     $model->is_promo = $request->post('is_promo');
    //     $model->is_top = $request->post('is_top');
    //     $model->tax = $request->post('tax');
    //     $model->status = 1;
    //     $model->save();

    //     // Handle multiple images
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $image_name = time() . rand(100, 999) . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('uploads/products'), $image_name);

    //             // Save each image to the product_images table
    //             ProductImage::create([
    //                 'product_id' => $model->id,
    //                 'product_name' => $model->product_name,
    //                 'image_path' => 'uploads/products/' . $image_name,
    //             ]);
    //         }
    //     }

    //     session()->flash('message', $msg);
    //     return redirect('admin/product');
    // }

    // orignal
    // public function manage_product_process(Request $request)
    // {
    //     if ($request->post('id') > 0) {
    //         $image_validation = "mimes:jpeg,jpg,png,tif,avif,webp";
    //     } else {
    //         $image_validation = "required|mimes:jpeg,jpg,png,tif,avif,webp";
    //     }

    //     $request->validate([
    //         'product_name' => 'required',
    //         'product_slug' => 'required|unique:products,product_slug,' . $request->post('id'),
    //         'product_image' => $image_validation,
    //     ]);

    //     if ($request->post('id') > 0) {
    //         $model = Product::find($request->post('id'));
    //         $msg = "Product updated";
    //     } else {
    //         $model = new Product();
    //         $msg = "Product inserted";
    //     }

    //     // Correct field name for image
    //     if ($request->hasFile('product_image')) {
    //         $image = $request->file('product_image');
    //         $image_name = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('uploads/products'), $image_name);
    //         $model->product_image = 'uploads/products/' . $image_name;
    //     }

    //     // Corrected fields based on DB
    //     $model->subcategory_id = $request->post('subcategory_id');
    //     $model->product_name = $request->post('product_name');
    //     $model->product_slug = $request->post('product_slug');
    //     $model->sku = $request->post('sku');
    //     $model->product_shortdesc = $request->post('product_shortdesc');
    //     $model->prodcut_desc = $request->post('product_desc'); // typo from DB kept as-is
    //     $model->technical_specification = $request->post('technical_specification');
    //     $model->price = $request->post('price');
    //     $model->mrp = $request->post('mrp');
    //     $model->keyword = $request->post('keyword');
    //     $model->is_trending = $request->post('is_trending');
    //     $model->is_promo = $request->post('is_promo');
    //     $model->is_top = $request->post('is_top');
    //     $model->tax = $request->post('tax');
    //     $model->status = 1;
    //     $model->save();

    //     if ($request->hasFile('product_image')) {
    //         foreach ($request->file('product_image') as $image) {
    //             $image_name = time() . rand(100, 999) . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('uploads/products'), $image_name);

    //             ProductImage::create([
    //                 'product_id' => $model->id,
    //                 'product_name' => $model->product_name,
    //                 'image_path' => 'uploads/products/' . $image_name,
    //             ]);
    //         }
    //     }

    //     session()->flash('message', $msg);
    //     return redirect('admin/product');
    // }


    public function delete(Request $request, $id)
    {
        $model = Product::find($id);
        if ($model) {
            $model->delete();
            session()->flash('message', 'Product deleted');
        } else {
            session()->flash('message', 'Product not found');
        }
        return redirect('admin/product');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Product::find($id);
        if ($model) {
            $model->status = $status;
            $model->save();
            session()->flash('message', 'Product status updated');
        } else {
            session()->flash('message', 'Product not found');
        }
        return redirect('admin/product');
    }

    public function productdetails($slug)
    {

        $product = Product::where('product_slug', $slug)->firstOrFail();
        $product_images = ProductImage::where('product_id', $product->id)->get();

        return view('product-details', compact('product', 'product_images'));
    }
}
