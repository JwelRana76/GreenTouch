@extends('layouts.frontend.extend')
@section('frontend_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs" style="overflow: visible">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Career</h2>
        @auth
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: none">
              {{ Auth::guard('web')->user()->name }}
            </button>
            <ul class="dropdown-menu" style="z-index: 11">
              <li><a class="dropdown-item" href="{{ route('userProfileView') }}">Profile</a></li>
              <li><a class="dropdown-item" href="{{ route('career.personal_details') }}">Career Details</a></li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();">Logout</a></li>
              </form>
            </ul>
          </div>
        @else
        <a href="{{ route('login') }}" class="text-dark">Login</a>
        @endauth
        
      </div>

    </div>
</section><!-- End Breadcrumbs -->
  <!-- ======= Hero Section ======= -->
@yield('career-content')
@endsection