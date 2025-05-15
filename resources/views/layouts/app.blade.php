<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TUBO ADMIN</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('assets/admin/vendors/typicons.font/font/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="{{ asset('assets/admin/images/sssfavicon.png') }}" /> -->
</head>

<body>
        @yield('content')
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/admin/js/template.js') }}"></script>
  <script src="{{ asset('assets/admin/js/settings.js') }}"></script>
  <script src="{{ asset('assets/admin/js/todolist.js') }}"></script>
  <!-- endinject -->
</body>

</html>
