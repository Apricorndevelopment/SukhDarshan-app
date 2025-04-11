<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {

        $result['data'] = Blog::all();
        return view('admin.blog', $result);
    }



    public function manage_blog(Request $request, $id = 0)
    {
        if ($id > 0) {
            $arr = Blog::Where(['id' => $id])->get();
            $result['blog_type'] = $arr['0']->blog_type;
            $result['blog_name'] = $arr['0']->blog_name;
            $result['blog_image'] = $arr['0']->blog_image;
            $result['blog_slug'] = $arr['0']->blog_slug;
            $result['blog_shortdesc'] = $arr['0']->blog_shortdesc;
            $result['blog_desc'] = $arr['0']->blog_desc;
            $result['post_by'] = $arr['0']->post_by;
        } else {
            $result['blog_type'] = '';
            $result['blog_name'] = '';
            $result['blog_image'] = '';
            $result['blog_slug'] = '';
            $result['blog_shortdesc'] = '';
            $result['blog_desc'] = '';
            $result['post_by'] = '';
        }

        $result['id'] = $id;
        return view('admin/manage_blog', $result);
    }


    public function manage_blog_process(Request $request)
    {
        if ($request->post('id') > 0) {
            $image_validation = "mimes:jpeg,jpg,png,tif,avif,webp";
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png,tif,avif,webp";
        }

        $request->validate([
            'blog_name' => 'required',
            'blog_slug' => 'required|unique:blogs,blog_slug,' . $request->post('id'),
            'blog_image' => $image_validation,
        ]);

        if ($request->post('id') > 0) {
            $model = Blog::find($request->post('id'));
            $msg = "Blog updated";
        } else {
            $model = new Blog();
            $msg = "Product inserted";
        }

        // Correct field name for image
        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $image_name);
            $model->blog_image = 'uploads/products/' . $image_name;
        }


        $model->blog_name = $request->post('blog_name');
        $model->blog_type = $request->post('blog_type');
        $model->blog_slug = $request->post('blog_slug');
        $model->blog_shortdesc = $request->post('blog_shortdesc');
        $model->blog_desc = $request->post('blog_desc');
        $model->post_by = $request->post('post_by');

        $model->save();

        session()->flash('message', $msg);
        return redirect('admin/blog');
    }



    public function delete(Request $request, $id)
    {
        $model = Blog::find($id);
        if ($model) {
            $model->delete();
            session()->flash('message', 'Blog deleted');
        } else {
            session()->flash('message', 'Blog not found');
        }
        return redirect('admin/blog');
    }


    public function blog_details($slug)
    {
        $blog = Blog::where('blog_slug', $slug)->firstOrFail();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        // return view('blogdetails', ['blog' => $blog]);
        return view('blogdetails', [
            'blog' => $blog,
            'recentBlogs' => $recentBlogs
        ]);
    }
}
