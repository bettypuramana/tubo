<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tubo</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/typicons.font/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vertical-layout-light/style.css') }}">
      <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTable/dataTables.bootstrap5.min.css') }}">
    <!-- endinject -->
        @yield('css')
  </head>
  <body>
   
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="" style="margin: 73px;color:#e23636;">TUBO<!--<img src="{{ asset('assets/admin/images/logo.svg') }}" alt="logo"/>--></a>
          <a class="navbar-brand brand-logo-mini" href=""><!--<img src="{{ asset('assets/admin/images/logo-mini.svg') }}" alt="logo"/>--></a>
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <!-- <ul class="navbar-nav mr-lg-2">
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="{{ route('contact-list') }}">
                Contact
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="{{ route('career-list') }}">
                Careers
              </a>
            </li>
          </ul> -->
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="{{ asset('assets/admin/images/user.png') }}" alt="image" style="box-shadow: none;">
                <span class="nav-profile-name">Tubo Admin</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{ route('password.change') }}">
                <i class="typcn typcn-cog text-primary"></i>
                Change Password
                </a>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="typcn typcn-power text-primary"></i>
                Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="{{ asset('assets/admin/images/user.png') }}" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                  Tubo Admin
                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div>
            
            <p class="sidebar-menu-title"></p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard </span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="{{ route('services-list') }}">
              <i class="typcn typcn-spanner menu-icon"></i>
              <span class="menu-title">Services </span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('clients-list') }}">
              <i class="typcn typcn-group menu-icon"></i>
              <span class="menu-title">Clients </span>
            </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact-list') }}">
              <i class="typcn typcn-contacts menu-icon"></i>
              <span class="menu-title">Contact </span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('career-list') }}">
              <i class="typcn typcn-briefcase menu-icon"></i>
              <span class="menu-title">Careers </span>
            </a>
          </li>         
        </ul>
        
      </nav>

@yield('content')

       <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © {{ date('Y') }}.</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/admin/js/template.js') }}"></script>
    <script src="{{ asset('assets/admin/js/settings.js') }}"></script>
    <script src="{{ asset('assets/admin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('assets/admin/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
   <!-- DataTables JS -->
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
      $('#contactTable').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true
      });
    </script>
  </body>
      @yield('js')
</html>