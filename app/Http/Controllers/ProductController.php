<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Companylogo;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $result['data'] = Product::paginate(30);
        $logo = Companylogo::first();
        return view('admin.product', $result);
        // return view('admin.product', compact('data', 'logo'));
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
        $result['variants'] = ProductVariant::where('product_id', $id)->get();
        $logo = Companylogo::first();

        return view('admin/manage_product', $result);
    }


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
        // Remove old variants if updating
        ProductVariant::where('product_id', $model->id)->delete();

        // Save new variants
        $variant_names = $request->variant_name;
        $variant_skus = $request->variant_sku;
        $variant_prices = $request->variant_price;
        $variant_mrps = $request->variant_mrp;

        for ($i = 0; $i < count($variant_names); $i++) {
            ProductVariant::create([
                'product_id' => $model->id,
                'variant_name' => $variant_names[$i],
                'sku' => $variant_skus[$i],
                'price' => $variant_prices[$i],
                'mrp' => $variant_mrps[$i],
            ]);
        }

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
        // $logo = Companylogo::first();
        return redirect('admin/product', compact('logo'));
    }


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
        $logo = Companylogo::first();
        return redirect('admin/product', compact('logo'));
    }


    public function productdetails($id)
    {
        $product = Product::with('variants')->findOrFail($id); // Will throw 404 if not found

        $product_images = ProductImage::where('product_id', $id)->get();
        $logo = Companylogo::first();

        return view('product-details', compact('product', 'product_images', 'compact'));
    }
}
