@extends('admin/layout')
@section('page_title', 'Manage Orders')
@section('container')
    <style>
        /* Dark and Light Theme Compatibility */
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --background-color-light: #f8f9fa;
            --background-color-dark: #343a40;
            --text-color-light: #212529;
            --text-color-dark: #e9ecef;
            --border-color: #dee2e6;
        }

        /* Body & Page Wrapper */
        body {
            background-color: var(--background-color-light);
            color: var(--text-color-light);
        }

        .content-wrapper {
            padding: 30px;
            background-color: var(--background-color-light);
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            overflow-x: auto;
        }

        .dark-mode .content-wrapper {
            background-color: var(--background-color-dark);
            color: var(--text-color-dark);
        }

        /* Header Styling */
        .top-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .top-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Table Styling */
        .table th,
        .table td {
            vertical-align: middle;
            padding: 12px;
            white-space: nowrap;
            text-align: center;
            border-color: var(--border-color);
        }

        .table {
            background-color: var(--background-color-light);
        }

        .table th {
            background-color: var(--primary-color);
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        /* Table for Dark Mode */
        .dark-mode .table {
            background-color: var(--background-color-dark);
        }

        .dark-mode .table th {
            background-color: var(--primary-color);
            color: var(--text-color-dark);
        }

        .dark-mode .table tbody tr:hover {
            background-color: #444;
        }

        /* Input and Button Styles */
        .form-control {
            border-radius: 10px;
            border: 1px solid var(--border-color);
            padding: 10px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .navbar-search {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            padding: 10px 15px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .table thead {
                display: none;
            }

            .table tbody td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid var(--border-color);
            }

            .table tbody td::before {
                content: attr(data-label);
                font-weight: bold;
                width: 50%;
            }
        }
    </style>

    <div class="container mt-4">
        <div class="top-header">
            <h1 class="h4 mb-0">Abandonment Cart</h1>
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
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Billing Address</th>
                        <th>City</th>
                        <th>Region</th>
                        <th>ZIP</th>
                        <th>Country</th>
                        <th>Shipping State</th>
                        <th>Shipping ZIP</th>
                        <th>Shipping Country</th>
                        <th>Payment Method</th>
                        <th>Payment ID</th>
                        <th>Total</th>
                        <th>Razorpay Order ID</th>
                        <th>Razorpay Payment ID</th>
                        <th>Razorpay Signature</th>
                        <th>Payment Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->first_name }}</td>
                            <td>{{ $order->last_name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->contact }}</td>
                            <td>{{ $order->billing_address }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->region }}</td>
                            <td>{{ $order->zip }}</td>
                            <td>{{ $order->country }}</td>
                            <td>{{ $order->shipping_state }}</td>
                            <td>{{ $order->shipping_zip }}</td>
                            <td>{{ $order->shipping_country }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->payment_id }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->razorpay_order_id }}</td>
                            <td>{{ $order->razorpay_payment_id }}</td>
                            <td>{{ $order->razorpay_signature }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
            $('table tbody tr').filter(function() {
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
            downloadLink.download = "orders.csv";
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
            XLSX.utils.book_append_sheet(wb, ws, "Orders");
            XLSX.writeFile(wb, "orders.xlsx");
        });
    </script>

@endsection
