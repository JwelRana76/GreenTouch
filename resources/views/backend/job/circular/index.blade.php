@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Job Circular Section
            <a href="{{ route('admin.circular.create') }}" class="float-end btn btn-sm btn-primary">Circular Add</a>
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Post</th>
                    <th>Circular Date</th>
                    <th>Circular Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <br>
            <tbody>
                @forelse ($circulars as $circular)
                    <tr>
                        <td>{{ $circular->id }}</td>
                        <td>{{ $circular->post }}</td>
                        <td>{{ Carbon\Carbon::parse($circular->updated_at)->format('d/m/Y') }}</td>
                        <td>{{ date('d-m-Y', strtotime($circular->death_line ?? ''->Fecha)) }}</td>
                        <td>
                            <a href="{{ route('admin.circular.edit',$circular->id) }}"><i class="mdi mdi-content-save-edit fs-3"></i></a>
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
            $('#myTable').DataTable();
        } );
    </script>
@endpush