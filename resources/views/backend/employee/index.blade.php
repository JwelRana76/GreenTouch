@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Employee Section
            <a href="{{ route('admin.employee.create') }}" class="float-end btn btn-sm btn-primary">Add Employee</a>
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $key=>$employee)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->designation }}</td>
                        <td>{{ $employee->contact }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            <img src="{{ asset('storage/uploads/employee').'/'.$employee->photo }}" alt="Slider" width="100" height="60">
                        </td>
                        <td>
                            <a href="{{ route('admin.employee.edit',$employee->id) }}" class=""><i class="mdi mdi-content-save-edit fs-3"></i></a>
                            <a onclick="return confirm('Are you sure..??')" href="{{ route('admin.employee.show',$employee->id) }}" class=""><i class="mdi mdi-trash-can fs-3 text-danger"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No Data Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection