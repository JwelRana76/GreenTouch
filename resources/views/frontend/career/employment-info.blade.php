@extends('layouts.frontend.career')
@section('career-content')
<section class="career">
    <div class="container">
      <div class="row">
        <h4 class="mb-5">Please fill in all required information step by step in each section.</h4>
        <div class="col-md-3">
          @php
            $a = 0;
          @endphp
          @include('frontend.career.sidebar')
        </div>
        <div class="col-md-9">
          <div class="container">
              <div class="row educational-info">
                  
                  <div class="col-md-12 col-sm-12 col-xl-12">
                    <h5>Employment History <span class="text-danger">*</span></h5>
                    <div class="row g-3 align-items-center  mb-4">
                        <table>
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Position</th>
                                    <th>Department</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                </tr>
                            </thead>
                            <tbody>
                              <ul id="error"></ul>
                                <tr>
                                    <td>
                                        <input type="text" name="company_name" class="company_name form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="position" class="position form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="department" class="department form-control">
                                    </td>
                                    <td><input type="date" name="from_date" id="from_date" class="form-control"></td>
                                    <td><input type="date" name="to_date" id="to_date" class="form-control"></td>
                                    <td><input type="button" name="" id="addEmploymentinfo" class="btn btn-sm btn-info" value="Add"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                          <tbody class="employment_tbody"></tbody>
                        </table>
                    </div>
                    <form action="{{ route('employment_infoConform') }}" method="POST">
                      @csrf
                      <input type="hidden" value="" class="status">
                      <button type="submit" id="employmentinfoconform" class="btn btn-primary">Save & Continue</button>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('frontend_script')
  <script>
    fatchemploymentinfo();
    function fatchemploymentinfo(){
      var status = 0;
      $.ajax({
        type: "GET",
        url: '{{ route("employment_info.index") }}',
        dataType:"json",
        success: function (response) {
            // console.log(response.referance);
            $('.employment_tbody').html("");
            $.each(response.employmentinfo, function (key, item) { 
                  $('.employment_tbody').append(`<tr>
                          <td>`+item.company_name+`</td>
                          <td>`+item.position+`</td>
                          <td>`+item.department+`</td>
                          <td>`+item.from_date+`</td>
                          <td>`+item.to_date+`</td>
                          <td><button type="button" value="`+item.id+`" class="employmentinfodelete float-end text-danger" style="border:none;background:none"><i class="bu bi-trash"></i></button></td>
                        </tr>`)
              status++;
            });
            if (status <= 0) {
              document.getElementById("employmentinfoconform").style.display = "none";
            }else{
              document.getElementById("employmentinfoconform").style.display = "block";
            }
          }
      });
    }
    $('#addEmploymentinfo').click(function (e) { 
      e.preventDefault();
      let user_id = $('.user_id').val();
      let company_name = $('.company_name').val()
      let position = $('.position').val();
      let department = $('.department').val();
      let from_date = $('#from_date').val();
      let to_date = $('#to_date').val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        type: "POST",
        url: "{{ route('employment_info.store') }}",
        data: {
          user_id:user_id,
          company_name:company_name,
          position:position,
          department:department,
          from_date:from_date,
          to_date:to_date
        },
        dataType: "json",
        success: function (response) {
          if (response.error) {
            // console.log(response.error);
              $('#error').html("");
              $.each(response.error, function (key, error_value) { 
                    $('#error').append(`<li>`+error_value+`</li>`);
                    $('#error').addClass('text-danger');
              });
          }else{
            console.log(response.success);
              $('.tbodywithfiil').find('input').val("");
              fatchemploymentinfo();
          }
        }
      });
    });

    $(document).on('click','.employmentinfodelete', function (e) {
      e.preventDefault();
      let id = $(this).val();
      alert(id)
      $.ajax({
        type: "GET",
        url: '/career/employment_info/employment_infoDelete/'+id,
        dataType: "json",
        success: function (response) {
          if (response.error) {
            console.log(response.error);
          }else{
            fatchemploymentinfo();
          }
        }
      });
    });
  </script>
@endpush
