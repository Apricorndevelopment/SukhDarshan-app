@extends('admin/layout')
@section('page_title', 'Manage_Blog')
@section('container')

    <style>
        .form-label {
            font-weight: 600;
        }

        .card {
            border-radius: 12px;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .container-fluid {
            padding-left: 30px;
            padding-right: 30px;
        }
    </style>

    @if ($id > 0)
        @php $image_required = ''; @endphp
    @else
        @php $image_required = 'required'; @endphp
    @endif

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11 offset-lg-1">

                <div class="top-header">
                    <h1 class="h3">Manage Blog</h1>
                    <a href="{{ url('admin/blog') }}" class="btn btn-success">Back</a>
                </div>

                <form action="{{ route('blog.manage_blog_process') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label for="blog_name" class="form-label">Blog Name</label>
                                <input id="blog_name" value="{{ $blog_name }}" name="blog_name" type="text"
                                    class="form-control" required>
                                @error('blog_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="blog_slug" class="form-label">Blog Slug</label>
                                <input id="blog_slug" value="{{ $blog_slug }}" name="blog_slug" type="text"
                                    class="form-control" required>
                                @error('blog_slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="blog_type" class="form-label">Blog Type</label>
                                <input id="blog_type" value="{{ $blog_type }}" name="blog_type" type="text"
                                    class="form-control" required>
                                @error('blog_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="blog_image" class="form-label">Blog Image</label>
                                <input id="blog_image" name="blog_image" type="file" class="form-control"
                                    {{ $image_required }}>
                                @error('blog_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="blog_shortdesc" class="form-label">Blog Short Desc</label>
                                <textarea id="blog_shortdesc" name="blog_shortdesc" class="form-control" required>{{ $blog_shortdesc }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="blog_desc" class="form-label">Blog Desc</label>
                                <textarea id="blog_desc" name="blog_desc" class="form-control" required>{{ $blog_desc }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="post_by" class="form-label">Post By</label>
                                <textarea id="post_by" name="post_by" class="form-control" required>{{ $post_by }}</textarea>
                            </div>

                            <input type="hidden" name="id" value="{{ $id }}" />
                            <button type="submit" class="btn btn-info w-100 mt-3">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('blog_shortdesc');
        CKEDITOR.replace('blog_desc');
        CKEDITOR.replace('post_by');
    </script>

@endsection
