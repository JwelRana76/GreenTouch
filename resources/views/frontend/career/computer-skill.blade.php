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
            <form action="{{ route('computer-skill.store') }}" method="POST">
              @csrf
              <div class="row educational-info">
                  
                  <div class="col-md-12 col-sm-12 col-xl-12">
                    <h5>Career Objective</h5>
                    <div class="row g-3 align-items-center  mb-4">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <textarea name="career_objective" id="" cols="30" rows="5" class="form-control" required>{{ Auth::user()->personaldetails->career_objective ?? '' }}</textarea>
                                        <small class="text-danger">@error('career_objective'){{ $message }}@enderror</small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xl-12">
                    <h5>Computer Skills</h5>
                    <div class="row g-3 align-items-center  mb-4">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <textarea name="computer_skill" id="" cols="30" rows="5" class="form-control" required>{{ Auth::user()->personaldetails->computer_skill ?? '' }}</textarea>
                                        <small class="text-danger">@error('computer_skill'){{ $message }}@enderror</small>
                                      </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Save & Continue</button>
                  </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection