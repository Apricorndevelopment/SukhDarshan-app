<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayurveda Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('adminassets/images/SDP LOGO.png') }}" sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/remixicon.css') }}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/bootstrap.min.css') }}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/apexcharts.css') }}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/editor.quill.snow.css') }}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/flatpickr.min.css') }}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/full-calendar.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/magnific-popup.css') }}">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/slick.css') }}">
    <!-- prism css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/prism.css') }}">
    <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/file-upload.css') }}">

    <link rel="stylesheet" href="{{ asset('adminassets/css/lib/audioplayer.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('adminassets/css/style.css') }}">
</head>

<body>

    <aside class="sidebar">
        <button type="button" class="sidebar-close-btn">
            <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
        </button>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                <img src="{{ asset('adminassets/images/SDP LOGO.png') }}" alt="site logo" class="light-logo">
                <img src="{{ asset('adminassets/images/SDP LOGO.png') }}" alt="site logo" class="dark-logo">
                <img src="{{ asset('adminassets/images/SDP LOGO.png') }}" alt="site logo" class="logo-icon">
            </a>
        </div>
        <div class="sidebar-menu-area">
            <ul class="sidebar-menu" id="sidebar-menu">
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>Dashboard</span>
                    </a>
                    <ul class="sidebar-submenu">

                        <li>
                            <a href="{{ route('admin.dashboard') }}"><i
                                    class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                                Ayurveda</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-menu-group-title">Application</li>
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                        <span>Manage Category</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('admin.category') }}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Category</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.subcategory') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Sub Category</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.order') }}">
                        <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                        <span>Order</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                        <span>Order Item</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('admin.orderitem') }}"><i
                                    class="ri-circle-fill circle-icon text-info-600 w-auto"></i> All Order</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orderaccepted') }}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Accepted Order</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orderpending') }}"><i
                                    class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Pending Order</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.ordercancelled') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Cancelled Order</a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                        <span>Manage Blog</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('admin.blog') }}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> All Blog</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/manage_blog') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Create New
                                Blog</a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:folder-with-files-broken"class="menu-icon"></iconify-icon>
                        <span>Manage Product</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('admin.product') }}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Product List</a>
                        </li>
                        <li>
                            <a href=" {{ url('admin/manage_product') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Add Product</a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>Users</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('admin.users') }}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                Users List</a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:bill-list-broken" class="menu-icon"></iconify-icon>
                        <span>Invoice</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="#"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                All Invoices</a>
                        </li>
                        <li>
                            <a href="#"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                Create New Invoices</a>
                        </li>

                    </ul>
                </li>



            </ul>
        </div>
    </aside>

    <main class="dashboard-main">
        <div class="navbar-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <button type="button" class="sidebar-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid"
                                class="icon text-2xl non-active"></iconify-icon>
                            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                        </button>
                        <button type="button" class="sidebar-mobile-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                        </button>

                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                        <div class="dropdown d-none d-sm-inline-block">
                            <button
                                class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                                type="button" data-bs-toggle="dropdown">
                                <img src="{{ asset('adminassets/images/lang-flag.png') }}" alt="image"
                                    class="w-24 h-24 object-fit-cover rounded-circle">
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div
                                    class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-0">Choose Your Language
                                        </h6>
                                    </div>
                                </div>

                                <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">
                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="english">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="{{ asset('adminassets/images/flags/flag1.png') }}"
                                                    alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                                <span class="text-md fw-semibold mb-0">English</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto"
                                            id="english">
                                    </div>


                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="germany">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="{{ asset('adminassets/images/flags/flag4.png') }}"
                                                    alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                                <span class="text-md fw-semibold mb-0">Germany</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto"
                                            id="germany">
                                    </div>


                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="india">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="{{ asset('adminassets/images/flags/flag7.png') }}"
                                                    alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                                <span class="text-md fw-semibold mb-0">India</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto"
                                            id="india">
                                    </div>
                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="canada">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="{{ asset('adminassets/images/flags/flag8.png') }}"
                                                    alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                                <span class="text-md fw-semibold mb-0">Canada</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto"
                                            id="canada">
                                    </div>
                                </div>
                            </div>
                        </div><!-- Language dropdown end -->

                        <div class="dropdown">
                            <button class="d-flex justify-content-center align-items-center rounded-circle"
                                type="button" data-bs-toggle="dropdown">
                                <img src="{{ asset('adminassets/images/SDP LOGO.png') }}" alt="image"
                                    class="w-40-px h-40-px object-fit-cover rounded-circle">
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div
                                    class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-2">Sukh Darshan</h6>
                                        <span class="text-secondary-light fw-medium text-sm">Admin</span>
                                    </div>
                                    <button type="button" class="hover-text-danger">
                                        <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                    </button>
                                </div>
                                <ul class="to-top-list">

                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                                            href="{{ route('logout') }}">
                                            <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log
                                            Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- Profile dropdown end -->
                    </div>
                </div>
            </div>
        </div>


        <!-- main content -->

        <div class="dashboard-main-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                {{-- <h6 class="fw-semibold mb-0"> Dashboard</h6> --}}
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="index.php" class="d-flex align-items-center gap-1 hover-text-primary">
                            {{-- <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon> --}}
                            {{-- Dashboard -eCommerce- --}}
                        </a>
                    </li>
                    {{-- <li>-</li> --}}
                    <li class="fw-medium">
                    </li>
                </ul>

                @section('container') @show

            </div>
        </div>




        <footer class="d-footer">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">© 2025 Sukh Darshan. All Rights Reserved.</p>
                </div>
                <div class="col-auto">
                    {{-- <p class="mb-0">Made by <span class="text-primary-600">wowtheme7</span></p> --}}
                </div>
            </div>
        </footer>
    </main>


    <!-- jQuery library js -->
    <script src="{{ asset('adminassets/js/lib/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('adminassets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('adminassets/js/lib/apexcharts.min.js') }}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('adminassets/js/lib/dataTables.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('adminassets/js/lib/iconify-icon.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('adminassets/js/lib/jquery-ui.min.js') }}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('adminassets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('adminassets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Popup js -->
    <script src="{{ asset('adminassets/js/lib/magnifc-popup.min.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('adminassets/js/lib/slick.min.js') }}"></script>
    <!-- prism js -->
    <script src="{{ asset('adminassets/js/lib/prism.js') }}"></script>
    <!-- file upload js -->
    <script src="{{ asset('adminassets/js/lib/file-upload.js') }}"></script>
    <!-- audioplayer -->
    <script src="{{ asset('adminassets/js/lib/audioplayer.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('adminassets/js/app.js') }}"></script>
    <script src="{{ asset('adminassets/js/homeThreeChart.js') }}"></script>
    <!-- <?php echo isset($script) ? $script : ''; ?> -->
    <script>
        // SEARCH FUNCTIONALITY
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        // CSV DOWNLOAD FUNCTIONALITY
        $('#downloadCsv').click(function() {
            let csv = [];
            let rows = document.querySelectorAll("table tr");

            for (let i = 0; i < rows.length; i++) {
                let row = [],
                    cols = rows[i].querySelectorAll("td, th");
                for (let j = 0; j < cols.length - 1; j++) { // exclude Action column
                    row.push('"' + cols[j].innerText + '"');
                }
                csv.push(row.join(","));
            }

            // Download CSV
            let csvFile = new Blob([csv.join("\n")], {
                type: "text/csv"
            });
            let downloadLink = document.createElement("a");
            downloadLink.download = "blogs.csv";
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = "none";
            document.body.appendChild(downloadLink);
            downloadLink.click();
        });
    </script>



</body>

</html>
