@extends('layouts.frontend.extend')
@section('frontend_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Mission</h2>
        <ol>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li>Mission</li>
        </ol>
      </div>

    </div>
</section><!-- End Breadcrumbs -->
@endsection