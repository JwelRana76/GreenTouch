<!DOCTYPE html>
<html>
<head>
  <title>Star Admin Pro Laravel Dashboard Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link href="{{ asset('frontend/logo.jpg') }}" rel="icon">

  <!-- plugin css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/plugins/@mdi/font/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}">
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/dataTables.min.css') }}">
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    @include('layouts.backend.header')
    <div class="container-fluid page-body-wrapper">
      @include('layouts.backend.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layouts.backend.footer')
      </div>
    </div>
  </div>

  <!-- base js -->
  <script src="{{ asset('backend/js/app.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
  <script src="{{ asset('backend/assets/js/settings.js') }}"></script>
  <script src="{{ asset('backend/assets/js/todolist.js') }}"></script>
  <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/js/dataTables.min.js') }}"></script>
  <!-- end common js -->

  @stack('custom-scripts')
</body>
</html>