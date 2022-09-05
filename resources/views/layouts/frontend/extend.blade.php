<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>GT Consumer Shop Ltd</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

@include('layouts.frontend.link')
</head>

<body>

  <!-- ======= Header ======= -->
@include('layouts.frontend.header')

  <main id="main">
  
    @yield('frontend_content')

  </main><!-- End #main -->

  @include('layouts.frontend.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts.frontend.script')
  @stack('frontend_script')

</body>

</html>