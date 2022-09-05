@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.general-setting.update',$generalsetting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="facebook" class="label-control">Facebook</label>
                <input value="{{ $generalsetting->facebook }}" type="text" name="facebook" id="facebook" class="form-control" placeholder="Enter Tile" required>
                <span class="text-danger">@error('facebook'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="youtube" class="label-control">Youtube</label>
                <input value="{{ $generalsetting->youtube }}" type="text" name="youtube" id="youtube" class="form-control" placeholder="Enter Tile" required>
                <span class="text-danger">@error('youtube'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="logo" class="label-control">Logo</label>
                <input value="{{ $generalsetting->logo }}" type="file" name="logo" id="logo" class="form-control">
                <img src="{{ asset('storage/uploads/generalsetting').'/'.$generalsetting->logo }}" alt="Logo" width="60px" height="60px">
                <span class="text-danger">@error('logo'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>
@endsection