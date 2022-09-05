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
            <form action="{{ route('personal_details.store') }}" method="POST">
              @csrf
              <div class="row personal-details">
                  <div class="col-md-6 col-sm-12 col-xl-6">
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="fname" class="col-form-label">First Name</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <input name="fname" type="text" id="fname" class="form-control" required value="{{ Auth::user()->personaldetails->fname ?? '' }}">
                        <span class="text-danger">@error('fname'){{ $message }}@enderror</span>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-4">
                      <div class="col-auto">
                        <label for="father_name" class="col-form-label">Father Name</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <input name="father_name" type="text" id="father_name" class="form-control" required value="{{ Auth::user()->personaldetails->father_name ?? '' }}">
                        <span class="text-danger">@error('father_name'){{ $message }}@enderror</span>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-4">
                      <div class="col-auto">
                        <label for="date_of_birth" class="col-form-label">Date of Birth</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <input name="date_of_birth" type="date" id="date_of_birth" required class="form-control" value="{{ Auth::user()->personaldetails->date_of_birth ?? '' }}">
                        <span class="text-danger">@error('date_of_birth'){{ $message }}@enderror</span>
                      </div>
                    </div>
                    
                    <div class="row g-3 align-items-center mb-4">
                      <div class="col-auto">
                        <label for="religion" class="col-form-label">Religion</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <select name="religion" id="religion" class="form-control" required {{ Auth::user()->personaldetails->religion ?? '' }}>
                          <option value="">Select Religion</option>
                          <option value="Islam">Islam</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Other">Other</option>
                        </select>
                        <span class="text-danger">@error('religion'){{ $message }}@enderror</span>
                      </div>
                    </div>
                    
                    <div class="row g-3 align-items-center mb-4">
                      <div class="col-auto">
                        <label for="Nationality" class="col-form-label">Nationality</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <input name="nationality" value="Bangladeshi" type="text" id="Nationality" class="form-control" required value="{{ Auth::user()->personaldetails->nationality ?? '' }}">
                        <span class="text-danger">@error('nationality'){{ $message }}@enderror</span>
                      </div>
                    </div>
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="primary_mobile" class="col-form-label">Primary Mobile</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <input name="primary_mobile" type="text" id="primary_mobile" class="form-control" required value="{{ Auth::user()->personaldetails->primary_mobile ?? '' }}">
                        <span class="text-danger">@error('primary_mobile'){{ $message }}@enderror</span>
                      </div>
                    </div>
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="email" class="col-form-label">Email Address</label>
                      </div>
                      <div class="field-control">
                        <input name="email" type="text" id="email" class="form-control" required value="{{ Auth::user()->personaldetails->email ?? '' }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                      </div>
                    </div>
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="present_address" class="col-form-label">Present Address<span class="text-danger">*</span></label>
                      </div>
                      <div class="field-control">
                        <textarea name="present_address" id="present_address" cols="30" rows="3" class="form-control" required>{{ Auth::user()->personaldetails->present_address ?? '' }}</textarea>
                        <span class="text-danger">@error('present_address'){{ $message }}@enderror</span>
                      </div>
                    </div>
                  </div>
  
                  <div class="col-md-6 col-sm-12 col-xl-6">
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="lname" class="col-form-label">Last Name</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <input name="lname" type="text" id="lname" class="form-control"  required value="{{ Auth::user()->personaldetails->lname ?? '' }}">
                        <span class="text-danger">@error('lname'){{ $message }}@enderror</span>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="mother_name" class="col-form-label">Mother Name</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <input name="mother_name" type="text" id="mother_name" class="form-control" value="{{ Auth::user()->personaldetails->mother_name ?? '' }}">
                        <span class="text-danger">@error('mother_name'){{ $message }}@enderror</span>
                      </div>
                    </div>
                    
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="Gender" class="col-form-label">Genter</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <select name="gender" id="religion" class="form-control" required>
                          <option value="" selected>Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                        <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                      </div>
                    </div>
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="merital_status" class="col-form-label">Merital Status</label><span class="text-danger">*</span>
                      </div>
                      <div class="field-control">
                        <select name="marital_status" id="merital_status" class="form-control" required>
                          <option value="" selected>Select Merital Status</option>
                          <option value="married">Married</option>
                          <option value="single">Single</option>
                        </select>
                        <span class="text-danger">@error('marital_status'){{ $message }}@enderror</span>
                      </div>
                    </div>
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="NID" class="col-form-label">National ID</label>
                      </div>
                      <div class="field-control">
                        <input name="nid" type="text" id="NID" class="form-control" value="{{ Auth::user()->personaldetails->nid ?? '' }}">
                        <span class="text-danger">@error('nid'){{ $message }}@enderror</span>
                      </div>
                    </div>
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="secondary_mobile" class="col-form-label">Secondary Mobile</label>
                      </div>
                      <div class="field-control">
                        <input name="secondary_mobile" type="text" id="secondary_mobile" class="form-control" value="{{ Auth::user()->personaldetails->secondary_mobile ?? '' }}"> 
                        <span class="text-danger">@error('secondary_mobile'){{ $message }}@enderror</span>
                      </div>
                    </div>
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="blood_group" class="col-form-label">Blood Group</label>
                      </div>
                      <div class="field-control">
                        <input name="blood_group" type="text" id="blood_group" class="form-control" value="{{ Auth::user()->personaldetails->blood_group ?? '' }}">
                        <span class="text-danger">@error('blood_group'){{ $message }}@enderror</span>
                      </div>
                    </div>
  
                    <div class="row g-3 align-items-center  mb-4">
                      <div class="col-auto">
                        <label for="permanent_address" class="col-form-label">Permanent Address<span class="text-danger">*</span></label>
                      </div>
                      <div class="field-control">
                        <textarea name="permanent_address" id="permanent_address" cols="30" rows="3" class="form-control" required>{{ Auth::user()->personaldetails->permanent_address ?? '' }}</textarea>
                        <span class="text-danger">@error('permanent_address'){{ $message }}@enderror</span>
                      </div>
                    </div>
                  </div>
                  
                  <input type="submit" value="Save & Continue" class="btn btn-primary" style="width: auto">
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection