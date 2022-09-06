@extends('layouts.frontend.extend')
@section('frontend_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Our Team</h2>
        <ol>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li>Our Team</li>
        </ol>
      </div>

    </div>
</section><!-- End Breadcrumbs -->

  <!-- ======= Our Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
      <h2>Our <strong>Team</strong></h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
      <div class="select-police-station">
        <div class="mb-3 w-25 m-auto">
          <select name="policeStSion" id="policeStSion" class="form-control">
            <option value="all">All</option>
            <option value="taraganj">taraganj</option>
          </select>
        </div>
      </div>
      <div class="row mt-5" id="ourTeam">
          @foreach ($employee as $employee)
              
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up">
              <div class="member-img">
                  <img src="{{ asset('storage/uploads/employee').'/'.$employee->photo }}" class="img-fluid" alt="">
                  <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>{{ $employee->name }}</h4>
                  <span>{{ $employee->designation }}</span>
              </div>
              </div>
          </div>
  
          @endforeach
      </div>
    </div>
  </section><!-- End Our Team Section -->
@endsection
@push('frontend_script')
  <script>
    $('#policeStSion').change(function (e) { 
      e.preventDefault();
      var menu = $(this).val();
      $.ajax({
        type: "GET",
        url: "/our_team/search/"+menu,
        dataType: "json",
        success: function (response) {
          $.each(response.data, function (key, item) { 
             $('#ourTeam').append(`<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up">
              <div class="member-img">
                  <img src="{{ asset('storage/uploads/employee/`+item.photo+`') }}" class="img-fluid" alt="">
                  <div class="social">
                  <a href=""><i class="bi bi-facebook"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>`+item.name+`</h4>
                  <span>`+item.designation+`</span>
              </div>
              </div>
          </div>`);
          });
        }
      });
    });
  </script>
@endpush