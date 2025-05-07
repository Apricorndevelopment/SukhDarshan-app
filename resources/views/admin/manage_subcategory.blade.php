@extends('admin/layout')
@section('page_title', 'Manage SubCategory')
@section('container')

    <style>
        /* Form Wrapper Styling */
        .form-wrapper {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-wrapper .form-group,
        .form-wrapper .from-group {
            margin-bottom: 20px;
        }

        .form-wrapper label {
            font-weight: bold;
            margin-bottom: 8px;
            display: inline-block;
        }

        h2.mb10 {
            margin-bottom: 20px;
            text-align: left;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-header h1 {
            margin: 0;
        }

        /* Full Width Section Styling */
        .content-main {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 100%;
            box-sizing: border-box;
            padding: 30px;
        }

        .btn {
            font-size: 14px;
            padding: 8px 12px;
        }

        /* Full Width for Form */
        .container {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .form-control {
            width: 100%;
        }
    </style>

    <!-- Begin Page Content -->
    <section class="content-main">
        <div class="container">
            <!-- Flash message -->
            @if (session()->has('message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif


            <h2>Manage Sub Category</h2>
            <a href="{{ url('admin/subcategory') }}">
                <button type="button" class="btn btn-success">Back</button>
            </a>

            <div class="form-wrapper">
                <form action="{{ route('subcategory.manage_subcategory_process') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="subcategory_name">Sub Category Name</label>
                        <input id="subcategory_name" value="{{ $subcategory_name }}" name="subcategory_name" type="text"
                            class="form-control" style="background-color: white" required>
                        @if ($errors->has('subcategory_name'))
                            <div class="text-danger">{{ $errors->first('subcategory_name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="subcategory_slug">Sub Category Slug</label>
                        <input id="subcategory_slug" value="{{ $subcategory_slug }}" name="subcategory_slug" type="text"
                            class="form-control" style="background-color: white" required>
                        @if ($errors->has('subcategory_name'))
                            <div class="text-danger">{{ $errors->first('subcategory_name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($sub_categories_from_categories as $cat)
                                <option value="{{ $cat->id }}" {{ $category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('subcategory_name'))
                            <div class="text-danger">{{ $errors->first('subcategory_name') }}</div>
                        @endif
                    </div>

                    <div class="from-group">
                        <label>Sub Category Image</label>
                        <input type="file" name="subcategory_image" accept=".jpg,.jpeg,.png,.gif,.svg"
                            class="form-control">
                        @if ($errors->has('subcategory_name'))
                            <div class="text-danger">{{ $errors->first('subcategory_name') }}</div>
                        @endif

                        @if ($id > 0 && !empty($subcategory_image))
                            <div class="mt-2">
                                <img src="{{ asset($subcategory_image) }}" width="100">
                            </div>
                        @endif
                    </div>

                    <input type="hidden" name="id" value="{{ $id }}" />

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
