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
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="label-control">Email</label>
                        <input value="{{ $employee->email }}" type="text" name="email" id="email" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="contact" class="label-control">Contact</label>
                        <input value="{{ $employee->contact }}" type="text" name="contact" id="contact" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('contact'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="photo" class="label-control">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                        <span class="text-danger">@error('photo'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="designation" class="label-control">Designation</label>
                        <input value="{{ $employee->designation }}" type="text" name="designation" id="designation" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('designation'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="facebook" class="label-control">Facebook</label>
                        <input value="{{ $employee->facebook }}" type="text" name="facebook" id="facebook" class="form-control" placeholder="Enter Tile">
                        <span class="text-danger">@error('facebook'){{ $message }}@enderror</span>
                    </div>
                </div>
                <h6>Address</h6>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="village" class="label-control">village</label>
                        <textarea class="form-control" name="village" id="village" cols="30" rows="1" required>{{ $employee->village }}</textarea>
                        <span class="text-danger">@error('village'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="post_office" class="label-control">Post Office</label>
                        <textarea class="form-control" name="post_office" id="post_office" cols="30" rows="1" required>{{ $employee->post_office }}</textarea>
                        <span class="text-danger">@error('post_office'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="police_station" class="label-control">Police Station</label>
                        <textarea class="form-control" name="police_station" id="police_station" cols="30" rows="1" required>{{ $employee->police_station }}</textarea>
                        <span class="text-danger">@error('police_station'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="district" class="label-control">District</label>
                        <textarea class="form-control" name="district" id="district" cols="30" rows="1" required>{{ $employee->district }}</textarea>
                        <span class="text-danger">@error('district'){{ $message }}@enderror</span>
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