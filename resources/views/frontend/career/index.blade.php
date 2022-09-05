@extends('layouts.frontend.career')
@section('career-content')
    <section class="career-section">
        <div class="career-content">
            <h3>Welcome to GreenTouch Family</h3>
            <a href="" class="btn btn-primary">Read More</a>
        </div>
        <div class="job-circular my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-5 text-center">
                            <h4>All Job Circulars</h4>
                            <p class="text-danger">Before apply Please fillup all the required filed form your career details pages & see your cv whice will be submitted for this circular</p>
                        </div>
                        <div>
                            @if (Session::has('error'))
                                <div class="alert alert-danger" id="alert">
                                    {{ session::get('error') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success" id="alert">
                                    {{ session::get('success') }}
                                </div>
                            @endif
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job Post</th>
                                    <th>Job Circular Date</th>
                                    <th>Apply Last Date</th>
                                    <th>Job Details</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobCircular as $circular)
                                    <tr>
                                        <td>{{ $circular->post }}</td>
                                        <td>{{ Carbon\Carbon::parse($circular->updated_at)->format('d/m/Y') }}</td>
                                        <td>{{ date('d-m-Y', strtotime($circular->death_line ?? ''->Fecha)) }}</td>
                                        <td><a href="{{ route('viewCircularDetails',$circular->id) }}" target="_blank">{{ $circular->file }}</a></td>
                                        <td>
                                            <a href="{{ route('jobApplication',$circular->id) }}" class="btn btn-primary">Apply</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">There is no Job Circular</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- <ul>
                            <li class="d-flex"><p>IT Engineer</p><p>Circular Date</p><p>Death Line</p><p>Deatails</p><a href="" class="btn btn-success">Apply</a></li>
                            <li><p>IT Engineer</p><a href=""></a></li>
                            <li><p>IT Engineer</p><a href=""></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('frontend_script')
    <script>
        setTimeout(() => {
            $('#alert').remove();
        }, 3000);
    </script>
@endpush