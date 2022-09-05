@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add Employee
            <a href="{{ route('admin.employee.index') }}" class="float-end btn btn-sm btn-primary">Back</a>
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.employee.update',$employee->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="label-control">Name</label>
                        <input value="{{ $employee->name }}" type="text" name="name" id="name" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="label-control">Email</label>
                        <input value="{{ $employee->email }}" type="text" name="email" id="email" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="label-control">Contact</label>
                        <input value="{{ $employee->contact }}" type="text" name="contact" id="contact" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('contact'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="label-control">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                        <img src="{{ asset('storage/uploads/employee').'/'.$employee->photo }}" alt="Slider" width="60px" height="60px">
                        <span class="text-danger">@error('photo'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="designation" class="label-control">Designation</label>
                        <input value="{{ $employee->designation }}" type="text" name="designation" id="designation" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('designation'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="label-control">address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="2" required>{{ $employee->address }}</textarea>
                        <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="label-control">Facebook</label>
                        <input value="{{ $employee->facebook }}" type="text" name="facebook" id="facebook" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('facebook'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>
@endsection