@extends('admin/layout')
@section('page_title', 'Manage Order Items')
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

    <div class="container mt-4">
        {{-- <h2 class="mb-4">Order Items</h2> --}}
        <div class="top-header">
            <h1 class="h4 mb-0">Order Items</h1>
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
            </form>
        </div>




        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                @php
                                    $statusLabels = [
                                        0 => 'Cancelled',
                                        1 => 'Accepted',
                                        2 => 'Pending',
                                    ];
                                @endphp
                                <form method="POST" action="{{ route('admin.updateOrderItemStatus', $item->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="form-control">
                                        @foreach ($statusLabels as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ $item->status == $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <!-- Optional action like view/delete -->
                                <form action="{{ route('admin.deleteOrderItem', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this order item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {{ $orderItems->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <!-- Scripts -->
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
