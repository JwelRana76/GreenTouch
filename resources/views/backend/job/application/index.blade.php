@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Job Application Section</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="application">
            <thead>
                <tr>
                    <th>Post</th>
                    <th>Applicante Name</th>
                    <th>Apply Date</th>
                    <th>Applicante Details</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($applicantes as $applicante)
                    <tr>
                        <td>{{ $applicante->post }}</td>
                        <td>{{ $applicante->user->name }}</td>
                        <td>{{ Carbon\Carbon::parse($applicante->updated_at)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.application.show',$applicante->id) }}" target="_blank">view CV</a>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready( function () {
            $('#application').DataTable({
                info: false,
            });
        } );
    </script>
@endpush