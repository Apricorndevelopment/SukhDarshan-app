@extends('admin/layout')
@section('page_title', 'Manage_Product')
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
    </style>

    @if ($id > 0)
        @php $image_required = ''; @endphp
    @else
        @php $image_required = 'required'; @endphp
    @endif

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <div class="top-header">
                    <h1 class="h3">Manage Product</h1>
                    <a href="{{ url('admin/product') }}" class="btn btn-success">Back</a>
                </div>

                <form action="{{ route('product.manage_product_process') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input id="product_name" value="{{ $product_name }}" name="product_name" type="text"
                                    class="form-control" required>
                                @error('product_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="product_slug" class="form-label">Product Slug</label>
                                <input id="product_slug" value="{{ $product_slug }}" name="product_slug" type="text"
                                    class="form-control" required>
                                @error('product_slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="product_image" class="form-label">Product Image</label>
                                <input id="product_image" name="product_image" type="file" class="form-control"
                                    {{ $image_required }}>
                                @error('product_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="subcategory_id" class="form-label">Subcategory</label>
                                <select id="subcategory_id" name="subcategory_id" class="form-control" required>
                                    <option value="">Select Subcategory</option>
                                    @foreach ($subcategory as $list)
                                        <option value="{{ $list->id }}"
                                            {{ $subcategory_id == $list->id ? 'selected' : '' }}>
                                            {{ $list->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="product_shortdesc" class="form-label">Product Short Desc</label>
                                <textarea id="product_shortdesc" name="product_shortdesc" class="form-control" required>{{ $product_shortdesc }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="product_desc" class="form-label">Product Desc</label>
                                <textarea id="product_desc" name="product_desc" class="form-control" required>{{ $product_desc }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="keyword" class="form-label">Keywords</label>
                                <textarea id="keyword" name="keyword" class="form-control">{{ $keyword }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="sku" class="form-label">SKU</label>
                                <textarea id="sku" name="sku" class="form-control">{{ $sku }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="technical_specification" class="form-label">Technical Specification</label>
                                <textarea id="technical_specification" name="technical_specification" class="form-control">{{ $technical_specification }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="price" class="form-label">Price</label>
                                <textarea id="price" name="price" class="form-control">{{ $price }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="mrp" class="form-label">MRP</label>
                                <textarea id="mrp" name="mrp" class="form-control">{{ $mrp }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tax" class="form-label">Tax</label>
                                <input id="tax" value="{{ $tax }}" name="tax" type="text"
                                    class="form-control" required>
                                @error('tax')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="is_promo" class="form-label">IS Promo</label>
                                    <select id="is_promo" name="is_promo" class="form-control" required>
                                        <option value="1" {{ $is_promo == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $is_promo == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="is_trending" class="form-label">IS Trending</label>
                                    <select id="is_trending" name="is_trending" class="form-control" required>
                                        <option value="1" {{ $is_trending == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $is_trending == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="is_top" class="form-label">IS Top</label>
                                    <select id="is_top" name="is_top" class="form-control" required>
                                        <option value="1" {{ $is_top == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $is_top == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
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
        CKEDITOR.replace('product_shortdesc');
        CKEDITOR.replace('product_desc');
        CKEDITOR.replace('technical_specification');
    </script>

@endsection
