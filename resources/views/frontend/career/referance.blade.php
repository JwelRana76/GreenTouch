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
                    <h5>Referance </h5>
                    <div class="row g-3 align-items-center  mb-4">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Institute Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Relation</th>
                                </tr>
                            </thead>
                            <tbody class="tbodywithfiil">
                              <ul id="error"></ul>
                                <tr>
                                    <td>
                                        <input type="text" name="name" class="name form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="institute_name" class="institute_name form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="address" class="address form-control" required>
                                    </td>
                                    <td><input type="text" name="contact" id="" class="contact form-control" required></td>
                                    <td><input type="text" name="relation" id="" class="relation form-control" required></td>
                                    <td><input type="button" name="" id="" class="referanceSave btn btn-sm btn-info" value="Add"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                          <tbody class="referance_body mt-5"></tbody>
                        </table>
                    </div>
                    
                    <form action="{{ route('referanceConform') }}" method="POST">
                      @csrf
                      <input type="hidden" value="" class="status">
                      <button type="submit" id="referanceconform" class="btn btn-primary">Save & Continue</button>
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
    fatchreferance();
    function fatchreferance(){
      var status = 0;
      $.ajax({
                type: "GET",
                url: '{{ route("referances.index") }}',
                dataType:"json",
                success: function (response) {
                    // console.log(response.referance);
                    $('.referance_body').html("");
                    $.each(response.referance, function (key, item) { 
                         $('.referance_body').append(`<tr>
                                  <td>`+item.name+`</td>
                                  <td>`+item.institute_name+`</td>
                                  <td>`+item.address+`</td>
                                  <td>`+item.contact+`</td>
                                  <td>`+item.relation+`</td>
                                  <td><button type="button" value="`+item.id+`" class="referdelete float-end text-danger" style="border:none;background:none"><i class="bu bi-trash"></i></button></td>
                                </tr>`);
                      status++;
                    });
                    if (status <= 0) {
                      document.getElementById("referanceconform").style.display = "none";
                    }else{
                      document.getElementById("referanceconform").style.display = "block";
                    }
                }
            });
            
    }

    // insert section
    $(document).on('click','.referanceSave', function (e) {
      e.preventDefault();
      let user_id = $('.user_id').val();
      let name = $('.name').val();
      let institute_name = $('.institute_name').val();
      let address = $('.address').val();
      let contact = $('.contact').val();
      let relation = $('.relation').val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      
      $.ajax({
        type: "POST",
        url: "{{ route('referances.store') }}",
        data: {
          user_id:user_id,
          name:name,
          institute_name:institute_name,
          address:address,
          contact:contact,
          relation:relation
        },
        dataType: "json",
        success: function (response) {
          if (response.error) {
              $('#error').html("");
              $.each(response.error, function (key, error_value) { 
                    $('#error').text(error_value);
              });
          }else{
              $('.tbodywithfiil').find('input').val("");
              fatchreferance();
          }
        }
      });
    });

    // Delete section

    $(document).on('click','.referdelete', function (e) {
      e.preventDefault();
      let id = $(this).val();
      $.ajax({
        type: "GET",
        url: '/career/referance/remove/'+id,
        dataType: "json",
        success: function (response) {
          if (response.error) {
            console.log(response.error);
          }else{
            fatchreferance();
          }
        }
      });
    });
  </script>
@endpush