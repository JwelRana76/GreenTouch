@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.contact.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="location" class="label-control">Location</label>
                <input value="{{ $contact->location }}" type="text" name="location" id="location" class="form-control" placeholder="Enter Tile" required>
                <span class="text-danger">@error('location'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="email" class="label-control">Email</label>
                <input value="{{ $contact->email }}" type="text" name="email" id="email" class="form-control" placeholder="Enter Tile" required>
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="phone" class="label-control">phone</label>
                <input value="{{ $contact->phone }}" type="text" name="phone" id="phone" class="form-control" placeholder="Enter Tile" required>
                <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>
@endsection