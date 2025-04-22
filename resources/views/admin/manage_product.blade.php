@extends('admin/layout')
@section('page_title', 'Manage Product')
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

        /* Full-screen style adjustments */
        .form-wrapper {
            max-width: 100%;
            margin: 0 auto;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
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

        .content-main {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .btn {
            font-size: 14px;
            padding: 8px 12px;
        }

        /* Full-width styling for forms and buttons */
        .card-body {
            width: 100%;
            box-sizing: border-box;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            box-sizing: border-box;
        }

        .form-group input[type="file"] {
            padding: 6px;
        }

        .btn-block {
            width: 100%;
        }

        .input-group {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .input-group input {
            width: 85%;
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
            <div class="col-lg-12"> <!-- Changed to full-width column -->
                <div class="top-header">
                    <h1 class="h3">Manage Product</h1>
                    <a href="{{ url('admin/product') }}" class="btn btn-success">Back</a>
                </div>

                <form action="{{ route('product.manage_product_process') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-wrapper">
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
                                    <label for="technical_specification" class="form-label">Technical Specification</label>
                                    <textarea id="technical_specification" name="technical_specification" class="form-control">{{ $technical_specification }}</textarea>
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

                                <div class="form-group mb-3">
                                    <label class="form-label">Product Multiple Images</label>
                                    <div id="multiImageWrapper">
                                        <div class="input-group mb-2">
                                            <input type="file" name="images[]" class="form-control" multiple>
                                            <button type="button" class="btn btn-success add-more">Add More</button>
                                        </div>
                                    </div>
                                </div>

                                @if (isset($images))
                                    <div class="row">
                                        @foreach ($images as $img)
                                            <div class="col-3 mb-2">
                                                <img src="{{ asset($img->image) }}" class="img-thumbnail"
                                                    width="100">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <div id="variant-wrapper">
                                    <label class="form-label">Product Multiple Variant</label>

                                    <div class="variant-group row g-3 mb-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Variant</label>
                                            <input type="text" name="variant_name[]" class="form-control"
                                                placeholder="e.g. 200ml" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">SKU</label>
                                            <input type="text" name="variant_sku[]" class="form-control"
                                                placeholder="SKU" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Price</label>
                                            <input type="text" name="variant_price[]" class="form-control"
                                                placeholder="Price" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">MRP</label>
                                            <input type="text" name="variant_mrp[]" class="form-control"
                                                placeholder="MRP" required>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeVariant(this)">Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="addVariant()">+ Add
                                    Variant</button>

                                {{-- <div id="variant-wrapper">
                                    <label class="form-label">Product Multiple Varient</label>
                                    <div class="variant-group">

                                        <input type="text" name="variant_name[]" placeholder="Variant (e.g. 200ml)"
                                            required>
                                        <input type="text" name="variant_sku[]" placeholder="SKU" required>
                                        <input type="text" name="variant_price[]" placeholder="Price" required>
                                        <input type="text" name="variant_mrp[]" placeholder="MRP" required>
                                        <button type="button" onclick="removeVariant(this)">Remove</button>
                                    </div>
                                </div>
                                <button type="button" onclick="addVariant()">+ Add Variant</button> --}}

                                <input type="hidden" name="id" value="{{ $id }}" />
                                <button type="submit" class="btn btn-info w-100 mt-3">Submit</button>
                            </div>
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

    {{-- <script>
        function addVariant() {
            let wrapper = document.getElementById('variant-wrapper');
            let div = document.createElement('div');
            div.classList.add('variant-group');
            div.innerHTML = `
                <input type="text" name="variant_name[]" placeholder="Variant (e.g. 200ml)" required>
                <input type="text" name="variant_sku[]" placeholder="SKU" required>
                <input type="text" name="variant_price[]" placeholder="Price" required>
                <input type="text" name="variant_mrp[]" placeholder="MRP" required>
                <button type="button" onclick="removeVariant(this)">Remove</button>
            `;
            wrapper.appendChild(div);
        }

        function removeVariant(btn) {
            btn.parentElement.remove();
        }
    </script> --}}

    <script>
        function addVariant() {
            let wrapper = document.getElementById('variant-wrapper');
            let div = document.createElement('div');
            div.classList.add('variant-group', 'row', 'g-3', 'mb-3');
            div.innerHTML = `
                <div class="col-md-3">
                    <label class="form-label">Variant</label>
                    <input type="text" name="variant_name[]" class="form-control" placeholder="e.g. 200ml" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">SKU</label>
                    <input type="text" name="variant_sku[]" class="form-control" placeholder="SKU" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Price</label>
                    <input type="text" name="variant_price[]" class="form-control" placeholder="Price" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">MRP</label>
                    <input type="text" name="variant_mrp[]" class="form-control" placeholder="MRP" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger" onclick="removeVariant(this)">Remove</button>
                </div>
            `;
            wrapper.appendChild(div);
        }

        function removeVariant(btn) {
            btn.closest('.variant-group').remove();
        }
    </script>


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.add-more').addEventListener('click', function() {
                    let newInputGroup = document.createElement('div');
                    newInputGroup.classList.add('input-group', 'mb-2');
                    newInputGroup.innerHTML = `
                    <input type="file" name="images[]" class="form-control">
                    <button type="button" class="btn btn-danger remove-image">Remove</button>
                `;
                    document.getElementById('multiImageWrapper').appendChild(newInputGroup);
                });

                document.getElementById('multiImageWrapper').addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-image')) {
                        e.target.closest('.input-group').remove();
                    }
                });
            });
        </script>
    @endpush

@endsection
