@extends('admin/layout')
@section('page_title', 'Category')
@section('container')

    <style>
        .form-wrapper {
            max-width: 600px;
            margin: auto;
        }

        .form-wrapper .form-group {
            padding: 20px;
        }

        .form-wrapper input[type="text"],
        .form-wrapper input[type="file"] {
            margin-bottom: 15px;
            padding: 10px;
        }

        .form-wrapper label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-wrapper img {
            margin-top: 10px;
        }

        .form-wrapper button[type="submit"] {
            margin-top: 20px;
            width: 100%;
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

        h1.mb10 {
            margin-bottom: 20px;
            text-align: left;
        }

        
    </style>

    {{-- <div class="top-header">
        <h1 class="mb10">Manage Category</h1>
        <a href="{{ url('admin/category') }}">
            <button type="button" class="btn btn-success">
                Back
            </button>
        </a>
    </div> --}}
    <section class="content-main" style="margin-right: 290px">
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

            <h2>Parent Category</h2>
            <a href="{{ url('admin/category') }}">
                <button type="button" class="btn btn-success">Back</button>
            </a>

            <div class="row m-t-30">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-wrapper">
                                        <form action="{{ route('category.manage_category_process') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="category_name">Category Name</label>
                                                <input id="category_name" value="{{ $category_name }}" name="category_name"
                                                    type="text" class="form-control" style="background-color: white"
                                                    required>

                                                <label for="category_slug">Category Slug</label>
                                                <input id="category_slug" value="{{ $category_slug }}" name="category_slug"
                                                    type="text" class="form-control" style="background-color: white"
                                                    required>

                                                <label>Category Image</label>
                                                <input type="file" name="category_image">

                                                @if ($id > 0 && !empty($category_image))
                                                    <img src="{{ asset($category_image) }}" width="100">
                                                @endif
                                            </div>

                                            <button type="submit" class="btn btn-info btn-block">Submit</button>
                                            <input type="hidden" name="id" value="{{ $id }}" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
