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
                    <h5>Academic information <span class="text-danger">*</span></h5>
                    <div class="row g-3 align-items-center  mb-4">
                      <ul id="error"></ul>
                        <table>
                            <thead>
                                <tr>
                                    <th>Label</th>
                                    <th>Degree Title</th>
                                    <th>Group</th>
                                    <th>Board</th>
                                    <th>CGPA</th>
                                    <th>Scale</th>
                                    <th>Passing Year</th>
                                </tr>
                            </thead>
                            <tbody class="tbodywithfiil">
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="label" placeholder="Enter Education Label">
                                    </td>
                                    <td>
                                      <input type="text" class="form-control" name="degree">
                                    </td>
                                    <td>
                                      <input type="text" class="form-control" name="group">
                                    </td>
                                    <td>
                                      <select name="board" id="" class="form-control">
                                        <option value=""></option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Jashore">Jashore</option>
                                        <option value="Dinajpur">Dinajpur</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Shylet">Shylet</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Barishl">Barishl</option>
                                        <option value="Cumilla">Cumilla</option>
                                        <option value="Madrasha">Madrasha</option>
                                      </select>
                                    </td>
                                    <td>
                                      <input type="number" name="cgpa" class="form-control">
                                    </td>
                                    <td>
                                      <input type="number" name="scale" class="form-control">
                                    </td>
                                    <td>
                                      <select name="passing_year" id="" class="form-control">
                                        <option value=""></option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                      </select>
                                    </td>
                                    <td><button type="button" class="AddEducation btn btn-sm btn-info">Add</button></td>
                                    {{-- <td><input type="button" name="" id="" class="AddEducation btn btn-sm btn-info" value="Add"></td> --}}
                                </tr>
                            </tbody>
                        </table>
                        <table>
                          <tbody class="educationinfo_body"></tbody>
                        </table>
                    </div>
                    <form action="{{ route('educationinfoConform') }}" method="POST">
                      @csrf
                      <input type="hidden" value="" class="status">
                      <button type="submit" id="eudcationinfoconform" class="btn btn-primary">Save & Continue</button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('frontend_script')
  <script>

  fatcheducation();
    function fatcheducation(){
      var status = 0;
      $.ajax({
        type: "GET",
        url: '{{ route("educational_info.index") }}',
        dataType:"json",
        success: function (response) {
            // console.log(response.educationinfo);
            $('.educationinfo_body').html("");
            $.each(response.educationinfo, function (key, item) { 
                  $('.educationinfo_body').append(`<tr>
                      <td>`+item.label+`</td>
                      <td>`+item.degree+`</td>
                      <td>`+item.group+`</td>
                      <td>`+item.board+`</td>
                      <td>`+item.cgpa.toFixed(2)+` out of `+item.scale+`</td>
                      <td>`+item.passing_year+`</td>
                      <td><button type="button" value="`+item.id+`" class="educationinfoDelete float-end text-danger" style="border:none;background:none"><i class="bu bi-trash"></i></button></td>
                    </tr>`);
              status++;
            });
            if (status <= 0) {
              document.getElementById("eudcationinfoconform").style.display = "none";
            }else{
              document.getElementById("eudcationinfoconform").style.display = "block";
            }
          }
      });
    }

    $('.AddEducation').click(function (e) { 
      e.preventDefault();
      let label = $("input[name='label']").val()
      let degree = $("input[name='degree']").val()
      let group = $("input[name='group']").val()
      let board = $("select[name='board']").val()
      let cgpa = $("input[name='cgpa']").val()
      let passing_year = $("select[name='passing_year']").val()
      let scale = $("input[name='scale']").val()
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        type: "POST",
        url: "{{ route('educational_info.store') }}",
        data: {
          label:label,
          degree:degree,
          group:group,
          cgpa:cgpa,
          scale:scale,
          passing_year:passing_year,
          board:board,
        },
        dataType: "json",
        success: function (response) {
          if (response.error) {
              $('#error').html("");
              $.each(response.error, function (key, error_value) { 
                    $('#error').append(`<li>`+error_value+`</li>`);
                    $('#error').addClass('text-danger');
              });
          }else{
            console.log(response.success);
              $('.tbodywithfiil').find('input').val("");
              fatcheducation();
          }
        }
      }); 
      
    });

    $(document).on('click','.educationinfoDelete', function (e) {
      e.preventDefault();
      let id = $(this).val();
      $.ajax({
        type: "GET",
        url: '/educationinfo/delete/'+id,
        dataType: "json",
        success: function (response) {
          if (response.error) {
            console.log(response.error);
          }else{
            fatcheducation();
          }
        }
      });
    });
  </script>
@endpush