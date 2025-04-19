@extends('admin/layout')
@section('page_title', 'Manage_Product')
@section('container')

    <style>
        .content-wrapper {
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            width: 100%;
            overflow-x: auto;
        }

        .top-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            white-space: nowrap;
        }

        .img-thumbnail {
            max-height: 50px;
        }

        .navbar-search {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .dropdown-toggle::after {
            margin-left: 8px;
        }

        @media (max-width: 768px) {
            .table thead {
                display: none;
            }

            .table tbody td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table tbody td::before {
                content: attr(data-label);
                font-weight: bold;
                width: 50%;
            }
        }
    </style>


    <div class="content-wrapper">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Header and Button -->
        <div class="top-header">
            <h1 class="h4 mb-0">Product</h1>
            <form class="navbar-search">
                <input type="text" id="searchInput" class="form-control" placeholder="Search...">

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="downloadDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download
                    </button>
                    <div class="dropdown-menu" aria-labelledby="downloadDropdown">
                        <a class="dropdown-item" href="#" id="downloadCsv">Download as CSV</a>
                        <a class="dropdown-item" href="#" id="downloadExcel">Download as Excel</a>
                    </div>
                </div>
                {{-- <a href="{{ url('admin/manage_product') }}" class="btn btn-success">Add Product</a> --}}
            </form>

        </div>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th style="width: 280px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->product_name }}</td>
                            <td>{{ $list->product_slug }}</td>
                            <td>
                                @if ($list->product_image)
                                    <img src="{{ asset($list->product_image) }}" class="img-thumbnail">
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/product/manage_product/' . $list->id) }}"
                                    class="btn btn-sm btn-success">Edit</a>

                                @if ($list->status == 1)
                                    <a href="{{ url('admin/product/status/0/' . $list->id) }}"
                                        class="btn btn-sm btn-primary">Active</a>
                                @else
                                    <a href="{{ url('admin/product/status/1/' . $list->id) }}"
                                        class="btn btn-sm btn-warning">Deactive</a>
                                @endif

                                <a href="{{ url('admin/product/delete/' . $list->id) }}"
                                    onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        // Search Function
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#blogTableBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // CSV Download
        $('#downloadCsv').click(function(e) {
            e.preventDefault();
            let csv = [];
            let rows = document.querySelectorAll("table tr");

            rows.forEach(row => {
                let cols = row.querySelectorAll("td, th");
                let rowData = [];
                cols.forEach((col, i) => {
                    if (i < cols.length - 1) {
                        rowData.push('"' + col.innerText.trim() + '"');
                    }
                });
                csv.push(rowData.join(","));
            });

            let csvFile = new Blob([csv.join("\n")], {
                type: "text/csv"
            });
            let downloadLink = document.createElement("a");
            downloadLink.download = "blogs.csv";
            downloadLink.href = URL.createObjectURL(csvFile);
            downloadLink.click();
        });

        // Excel Download
        $('#downloadExcel').click(function(e) {
            e.preventDefault();
            let ws_data = [];
            $("table tr").each(function() {
                let row = [];
                $(this).find("th, td").each(function(i, cell) {
                    if (i < $(this).closest('tr').find('th, td').length - 1) {
                        row.push($(cell).text().trim());
                    }
                });
                if (row.length) ws_data.push(row);
            });

            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.aoa_to_sheet(ws_data);
            XLSX.utils.book_append_sheet(wb, ws, "Blogs");
            XLSX.writeFile(wb, "blogs.xlsx");
        });
    </script>

@endsection
