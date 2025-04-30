@extends('admin/layout')
@section('page_title', 'Manage_blog')
@section('container')

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .center-wrapper {
            height: 80vh;
            margin-right: 400px;
            margin-top: 30px;
        }

        .overlay {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 9999;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            margin: auto;
            margin-top: 20px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="overlay">
        <div class="loader"></div>
    </div>

    <div class="center-wrapper">
        <form id="productupload" action="{{ url('upload-csv') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label><strong>Upload File:</strong></label><br><br>
            <input type="file" name="product_file" id="upload_file"><br><br>
            <input class="btn btn-danger" type="submit" name="save" value="Save">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $("#productupload").on("submit", function(e) {
            e.preventDefault();
            var upload_file = $("#upload_file").val();
            if (upload_file === "") {
                alert("Please select a file");
                return false;
            }

            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                method: "POST",
                url: "{{ url('upload-csv') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",

                beforeSend: function() {
                    $('.overlay').show();
                },
                success: function(response) {
                    alert('File uploaded successfully!');
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                },
                complete: function() {
                    $('.overlay').hide();
                }
            });
        });
    </script>
@endsection
