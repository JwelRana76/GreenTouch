@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add Employee
            <a href="{{ route('admin.employee.index') }}" class="float-end btn btn-sm btn-primary">Back</a>
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="label-control">Name</label>
                        <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="label-control">Email</label>
                        <input value="{{ old('email') }}" type="text" name="email" id="email" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="label-control">Contact</label>
                        <input value="{{ old('contact') }}" type="text" name="contact" id="contact" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('contact'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="label-control">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" required>
                        <span class="text-danger">@error('photo'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="designation" class="label-control">Designation</label>
                        <input value="{{ old('designation') }}" type="text" name="designation" id="designation" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('designation'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="label-control">address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="2" required>{{ old('address') }}</textarea>
                        <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="label-control">Facebook</label>
                        <input value="{{ old('facebook') }}" type="text" name="facebook" id="facebook" class="form-control" placeholder="Enter Tile" required>
                        <span class="text-danger">@error('facebook'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </form>
    </div>
</div>
@endsection