@extends('admin/layout')
@section('page_title', 'Manage Order Items')
@section('container')

    <style>
        :root {
            --bg-color: #f8f9fa;
            --text-color: #212529;
            --table-head-bg: #343a40;
            --table-head-color: #fff;
        }

        [data-theme="dark"] {
            --bg-color: #1e1e2f;
            --text-color: #f8f9fa;
            --table-head-bg: #2d2d3a;
            --table-head-color: #ffffff;
        }

        .content-wrapper {
            padding: 30px;
            background-color: var(--bg-color);
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
            color: var(--text-color);
            transition: background 0.3s, color 0.3s;
        }

        .top-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            white-space: nowrap;
        }

        .table thead {
            background-color: var(--table-head-bg);
            color: var(--table-head-color);
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

    <div class="container mt-4 content-wrapper">
        <div class="top-header">
            <h1 class="h4 mb-0">Order Items</h1>
            <form class="navbar-search d-flex flex-wrap gap-2">
                <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="downloadDropdown"
                        data-bs-toggle="dropdown">
                        Download
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" id="downloadCsv">Download as CSV</a></li>
                        <li><a class="dropdown-item" href="#" id="downloadExcel">Download as Excel</a></li>
                    </ul>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Order</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="blogTableBody">
                    @foreach ($orderItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.updateOrderItemStatus', $item->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="form-select">
                                        @php
                                            $statusLabels = [0 => 'Cancelled', 1 => 'Accepted', 2 => 'Pending'];
                                        @endphp
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
                                <form action="{{ route('admin.deleteOrderItem', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this order item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Search
        $('#searchInput').on('keyup', function() {
            const value = $(this).val().toLowerCase();
            $('#blogTableBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // CSV Download
        $('#downloadCsv').click(function(e) {
            e.preventDefault();
            let csv = [];
            $("table tr").each(function() {
                let row = [];
                $(this).find("th, td").each(function(i, el) {
                    if (i < $(this).parent().children().length - 1) {
                        row.push('"' + $(el).text().trim() + '"');
                    }
                });
                csv.push(row.join(","));
            });

            let csvFile = new Blob([csv.join("\n")], {
                type: "text/csv"
            });
            let downloadLink = document.createElement("a");
            downloadLink.download = "order_items.csv";
            downloadLink.href = URL.createObjectURL(csvFile);
            downloadLink.click();
        });

        // Excel Download
        $('#downloadExcel').click(function(e) {
            e.preventDefault();
            let data = [];
            $("table tr").each(function() {
                let row = [];
                $(this).find("td, th").each(function(i, el) {
                    if (i < $(this).parent().children().length - 1) {
                        row.push($(el).text().trim());
                    }
                });
                if (row.length) data.push(row);
            });

            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.aoa_to_sheet(data);
            XLSX.utils.book_append_sheet(wb, ws, "OrderItems");
            XLSX.writeFile(wb, "order_items.xlsx");
        });
    </script>

@endsection
