@extends('admin/layout')
@section('page_title', 'Manage Orders')
@section('container')

    <style>
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .navbar-search {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .table th,
        .table td {
            vertical-align: middle !important;
        }

        .table th {
            background-color: #343a40;
            color: #fff;
        }

        .table td {
            font-size: 14px;
        }

        .badge-date {
            font-size: 12px;
        }
    </style>
    {{-- @php
        $currentAction = class_basename(Route::currentRouteAction());
        [$controller, $method] = explode('@', $currentAction);
    @endphp

    Controller: {{ $controller }} <br> wire:
    Method: {{ $method }} --}}
    <div class="container mt-4">
        <div class="top-header">
            <h1 class="h4 mb-2">User List</h1>
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
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joining Date</th>
                        <th>Password</th>

                    </tr>
                </thead>
                <tbody id="userTableBody">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-dark" style="font-weight: 500;">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td>{{ $user->password }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        // Search Function
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#userTableBody tr').filter(function() {
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
                cols.forEach(col => {
                    rowData.push('"' + col.innerText.trim() + '"');
                });
                csv.push(rowData.join(","));
            });

            let csvFile = new Blob([csv.join("\n")], {
                type: "text/csv"
            });
            let downloadLink = document.createElement("a");
            downloadLink.download = "users.csv";
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
                    row.push($(cell).text().trim());
                });
                if (row.length) ws_data.push(row);
            });

            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.aoa_to_sheet(ws_data);
            XLSX.utils.book_append_sheet(wb, ws, "Users");
            XLSX.writeFile(wb, "users.xlsx");
        });
    </script>

@endsection
