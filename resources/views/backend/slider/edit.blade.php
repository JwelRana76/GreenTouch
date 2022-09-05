@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add Slider
            <a href="{{ route('admin.slider.index') }}" class="float-end btn btn-sm btn-primary">Back</a>
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="title" class="label-control">Title</label>
                <input value="{{ $slider->title }}" type="text" name="title" id="title" class="form-control" placeholder="Enter Tile" required>
                <span class="text-danger">@error('title'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="description" class="label-control">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="3" required>{{ $slider->description }}</textarea>
                <span class="text-danger">@error('description'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="image" class="label-control">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                <img src="{{ asset('storage/uploads/slider').'/'.$slider->image }}" alt="Slider" width="100px" height="60px">
                <span class="text-danger">@error('image'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <input type="submit" name="image" id="image" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>
@endsection