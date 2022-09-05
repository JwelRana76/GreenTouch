@extends('layouts.backend.master')
@section('content')
<div class="card" style="width: 500px;margin:auto">
    <div class="card-header">
        <h3>Add Circular Section
            <a href="{{ route('admin.circular.index') }}" class="float-end btn btn-sm btn-primary">Back</a>
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.circular.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="post" class="label-control">Post</label>
                <input value="{{ old('post') }}" type="text" name="post" id="post" class="form-control" placeholder="Enter Tile" required>
                <span class="text-danger">@error('post'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="death_line" class="label-control">Death Line</label>
                <input type="date" class="form-control" name="death_line" id="death_line" required>
                <span class="text-danger">@error('death_line'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="file" class="label-control">File</label>
                <input type="file" name="file" id="file" class="form-control" required>
                <span class="text-danger">@error('file'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </form>
    </div>
</div>
@endsection