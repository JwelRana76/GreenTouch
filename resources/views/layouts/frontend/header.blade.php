<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      @php
        $generalSetting = DB::table('general_settings')->where('id',1)->first();
      @endphp
      <h1 class="logo me-auto"><a href="index.html"><img src="{{ asset('storage/uploads/generalsetting').'/'.$generalSetting->logo }}" alt="Logo"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="{{ route('index') }}">Home</a></li>

          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="{{ route('mission') }}">Mission</a></li>
          <li><a href="{{ route('vision') }}">Vision</a></li>
          <li><a href="{{ route('our_project') }}">Our Project</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
          <li><a href="{{ route('our_team') }}">Our Team</a></li>
          <li><a href="{{ route('gallery') }}">Gallery</a></li>
          <li><a href="{{ route('career') }}">Career</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="https://www.facebook.com/{{ $generalSetting->facebook }}" target="_blank" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="https://www.youtube.com/{{ $generalSetting->youtube }}" target="_blank" class="linkedin"><i class="bu bi-youtube"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->
  @push('frontend_script')
    <script>
    </script>
  @endpush