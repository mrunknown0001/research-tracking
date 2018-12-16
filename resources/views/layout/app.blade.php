<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/material-dashboard.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pagination.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/multiple-select.css') }}">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/material-dashboard.min.js') }}"></script>
  <script src="{{ asset('js/multiple-select.js') }}"></script>
  
</head>
<body class="">
  
  @yield('content')

  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
   {{-- Google Maps Plugin    --}}
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  {{-- Chartist JS --}}
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}" type="text/javascript"></script>
   {{-- Notifications Plugin    --}}
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}" type="text/javascript"></script>
  {{-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --}}
  {{-- <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.0') }}" type="text/javascript"></script> --}}

  <script>
    setInterval(function () {

      $('#notificationbadge').load("/notification-count");
      
      $('#notification').load("/notifications");
    }, 3000);
  </script>
</body>
</html>