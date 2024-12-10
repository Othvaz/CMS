<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        @Vite(['resources/css/app.css',
        'resources/js/app.js',
        'resources/css/sb-admin-2.css',
        'resources/css/sb-admin-2.min.css',
        ])

        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


        <style>
            /* Custom Red Theme */
            .bg-gradient-primary {
                background: linear-gradient(180deg, #ff0000 10%, #cc0000 100%);
                color: white;
            }

            .text-primary {
                color: #ff0000 !important;
            }

            .btn-primary {
                background-color: #ff0000;
                border-color: #cc0000;
            }

            .btn-primary:hover {
                background-color: #cc0000;
                border-color: #990000;
            }
            .video-container {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.5s ease-in-out;
            }

            .video-container.open {
                max-height: 500px; /* Adjust this based on your video's expected height */
            }
            .image-container {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.5s ease-in-out;
            }

            .image-container.open {
                max-height: 400px; /* Adjust based on your image's expected height */
            }

            .image-container img {
                max-width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-text mx-3">Can Ngopi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Edit</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @if (Route::currentRouteName() === 'videos' 
            or Route::currentRouteName() === 'video.detail'
            or Route::currentRouteName() === 'video.update')
                active            
            @endif">
                <a class="nav-link" href="{{ route('videos') }}">
                    <i class="fas fa-fw fa-video"></i>
                    <span>Videos (Upload)</span>
                </a>
            </li>
            <li class="nav-item @if (Route::currentRouteName() === 'patterns')
                active
            @endif">
                <a class="nav-link" href="{{ route('patterns') }}">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Image & Pattern (Upload)</span>
                </a>
            </li>
            <li class="nav-item @if (Route::currentRouteName() === 'markers')
                active
            @endif">
                <a class="nav-link" href="{{ route('markers') }}">
                    <i class="fas fa-fw fa-map-marker-alt"></i>
                    <span>Marker</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('body')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <!-- Additional Scripts -->
    @stack('scripts')

</body>
</html>