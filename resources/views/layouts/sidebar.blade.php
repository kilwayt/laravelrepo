<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
        <!-- Scripts -->
    </head>
    <body>
    

        <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                  <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                      <a class="nav-link" href=>
                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                        <span class="menu-title">Dashboard</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  href="http://localhost:85/forudigital/public/"  >
                        <span class="icon-bg"><i class=" mdi mdi-account menu-icon"></i></span>
                        <span class="menu-title">Clients</span>
                      </a>
                      
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="">
                        <span class="icon-bg"><i class="mdi mdi-archive menu-icon"></i></span>
                        <span class="menu-title">Ventes</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="http://localhost:85/forudigital/public/">
                        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                        <span class="menu-title">Produit</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="http://localhost:85/soutenance1/achats_table.php">
                        <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                        <span class="menu-title">Achats</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="fournisseur_form.php">
                        <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                        <span class="menu-title">Fournisseurs</span>
                      </a>
                    </li>
                    
                    <li class="nav-item documentation-link">
                      <a class="nav-link" href="http://www.bootstrapdash.com/demo/connect-plus-free/jquery/documentation/documentation.html" target="_blank">
                        <span class="icon-bg">
                          <i class="mdi mdi-file-document-box menu-icon"></i>
                        </span>
                        <span class="menu-title">Documentation</span>
                      </a>
                    </li>
                    <li class="nav-item sidebar-user-actions">
                      <div class="user-details">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <div class="d-flex align-items-center">
                              <div class="sidebar-profile-img">
                              </div>
                              <div class="sidebar-profile-text">
                                <p class="mb-1">ilyas</p>
                              </div>
                            </div>
                          </div>
                          <div class="badge badge-danger">3</div>
                        </div>
                      </div>
                    </li>
                    <li class="nav-item sidebar-user-actions">
                      <div class="sidebar-user-menu">
                        <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
                          <span class="menu-title">Settings</span>
                        </a>
                      </div>
                    </li>
                    <li class="nav-item sidebar-user-actions">
                      <div class="sidebar-user-menu">
                        <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
                          <span class="menu-title">Take Tour</span></a>
                      </div>
                    </li>
                    <li class="nav-item sidebar-user-actions">
                      <div class="sidebar-user-menu">
                        <a href="logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                          <span class="menu-title">Log Out</span></a>
                      </div>
                    </li>
                  </ul>
                </nav>
                <!-- partial -->
              
        
                <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
                <!-- endinject -->
                <!-- Plugin js for this page -->
                <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
                <script src="{{ asset('assets/vendors/jquery-circle-progress/js/circle-progress.min.js') }}"></script>
                <!-- End plugin js for this page -->
                <!-- inject:js -->
                <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
                <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
                <script src="{{ asset('assets/js/misc.js') }}"></script>
                <!-- endinject -->
                <!-- Custom js for this page -->
                <script src="{{ asset('assets/js/dashboard.js') }}"></script>
          </body>
    
</html>
