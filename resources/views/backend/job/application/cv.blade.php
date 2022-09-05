<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.frontend.link')
</head>
<body>
    <section class="user-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="career-menu">
                        <ul class="float-end d-flex">
                            <li><a class="printcv btn btn-primary"><i class="bu bi-print"></i> Print</a></li>
                        </ul>
                    </div>
                    <hr class="w-100">
                    
                    <div class="userdetails mt-3">
                        <div class="cvchead text-center">
                            <h2>Curriculum Vitae <br> of </h2>
                            <h4>{{ $user->personaldetails->fname }} {{ $user->personaldetails->lname }}</h4>
                            <img src="{{ asset('storage/uploads/career').'/'.$user->personaldetails->picture }}" class="float-end" width="100px" height="120px" alt="">
                        </div>
                        <div class="mailing-address mt-3">
                            <p class="text-decoration-underline"><b><i> Mailing Address</i></b></p>
                            <p>{{ $user->personaldetails->present_address }}</p>
                            <p>Phone: {{ $user->personaldetails->primary_mobile }}</p>
                            <p>Email: {{ $user->personaldetails->email }}</p>
                        </div>
                        <div class="career-objective mt-3">
                            <h3 class="bg-secondary bg-opacity-25 mt-3 text-center">Carrer Objective</h3>
                            <p>{{ $user->personaldetails->career_objective }}</p>
                        </div>
                        <div class="academic-information mt-3">
                            <h3 class="bg-secondary bg-opacity-25 mt-3 text-center">Academic Information</h3>
                            @php
                                $education = DB::table('educational_infos')->where('user_id',$user->id)->where('status','conform')->get();
                            @endphp
                            @foreach ($education as $key=>$education )
                            <div class="d-flex">
                            <span class="me-3 fw-bolder">{{ ++$key }}.</span><p class="text-decoration-underline"><b> {{ $education->degree }}</b></p></div>
                            <div class="ms-2">
                                <p class="ms-4"><span class="fw-semibold">Subject</span>: {{ $education->group }}</p>
                                <p class="ms-4"><span class="fw-semibold">Board</span>: {{ $education->board }}</p>
                                <p class="ms-4"><span class="fw-semibold">Result</span>: {{ $education->cgpa }} (out of {{ $education->scale }})</p>
                                <p class="ms-4"><span class="fw-semibold">Passing Year</span>: {{ $education->passing_year }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="personal-details mt-3">
                            <h3 class="bg-secondary bg-opacity-25 mt-3 text-center">Personal Details</h3>
                            <div class="ms-2">
                                <p class="ms-4"><span class="fw-semibold">Name</span>: {{ $user->personaldetails->fname }} {{  $user->personaldetails->lname }}</p>
                                <p class="ms-4"><span class="fw-semibold">Father Name</span>: {{ $user->personaldetails->father_name }}</p>
                                <p class="ms-4"><span class="fw-semibold">Mother Name</span>: {{ $user->personaldetails->mother_name }}</p>
                                <p class="ms-4"><span class="fw-semibold">Date of Birth</span>: {{ $user->personaldetails->date_of_birth }}</p>
                                <p class="ms-4"><span class="fw-semibold">Gender</span>: {{ $user->personaldetails->gender }}</p>
                                <p class="ms-4"><span class="fw-semibold">Religion</span>: {{ $user->personaldetails->religion }}</p>
                                <p class="ms-4"><span class="fw-semibold">NID</span>: {{ $user->personaldetails->nid }}</p>
                                <p class="ms-4"><span class="fw-semibold">Blood Group</span>: {{ $user->personaldetails->blood_group }}</p>
                                <p class="ms-4"><span class="fw-semibold">Permanent Address</span>: {{ $user->personaldetails->permanent_address }}</p>
                            </div>
                        </div>
                        <div class="computer-skill mt-3">
                            <h3 class="bg-secondary bg-opacity-25 mt-3 text-center">Computer Skill</h3>
                            <p>{{ $user->personaldetails->computer_skill }}</p>
                        </div>
                        <div class="employment-information mt-3">
                            <h3 class="bg-secondary bg-opacity-25 mt-3 text-center">Employment Information</h3>
                            @php
                                $employmentinfo = DB::table('employment_infos')->where('user_id',$user->id)->get();
                            @endphp
                            <div class="ms-2">
                                <table class="table table-border">
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>Company</th>
                                            <th>Department</th>
                                            <th>Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employmentinfo as $key=>$employmentinfo )
                                        <tr>
                                            <td>{{ $employmentinfo->position }}</td>
                                            <td>{{ $employmentinfo->company_name }}</td>
                                            <td>{{ $employmentinfo->department }}</td>
                                            <td>{{ $employmentinfo->from_date }} <b>to</b> {{ $employmentinfo->to_date }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="referance mt-3">
                            <h3 class="bg-secondary bg-opacity-25 mt-3 text-center">Referances</h3>
                            @php
                                $user_referances = DB::table('user_referances')->where('user_id',$user->id)->get();
                            @endphp
                            <div class="">
                            <div class="ms-2">
                                <table class="table table-border">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Institute Name</th>
                                            <th>Contact</th>
                                            <th>Relation</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_referances as $key=>$user_referances )
                                        <tr>
                                            <td>{{ $user_referances->name }}</td>
                                            <td>{{ $user_referances->institute_name }}</td>
                                            <td>{{ $user_referances->contact }}</td>
                                            <td>{{ $user_referances->relation }}</td>
                                            <td>{{ $user_referances->address }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="signature w-10 float-end mt-5">
                            <img src="{{ asset('storage/uploads/career').'/'.$user->personaldetails->signature  }}" width="100px" height="30px" alt="">
                            <hr>
                            <p>{{ $user->personaldetails->fname ?? '' }} {{ $user->personaldetails->lname ?? '' }}</p>
                        </div>
                        <div class="post mt-5">
                            <p>Application for : {{ $circular->post }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('layouts.frontend.script')
    <script>
        $('.printcv').click(function (e) { 
            e.preventDefault();
            window.print()
        });
    </script>
</body>
</html>