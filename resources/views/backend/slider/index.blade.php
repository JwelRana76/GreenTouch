@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Slider Section
            <a href="{{ route('admin.slider.create') }}" class="float-end btn btn-sm btn-primary">Slider Add</a>
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($slider as $key=>$slider)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>
                            <img src="{{ asset('storage/uploads/slider').'/'.$slider->image }}" alt="Slider" width="100" height="60">
                        </td>
                        <td>
                            <a href="{{ route('admin.slider.edit',$slider->id) }}" class=""><i class="mdi mdi-content-save-edit fs-3"></i></a>
                            <a onclick="return confirm('Are you sure..??')" href="{{ route('admin.slider.destroy',$slider->id) }}" class=""><i class="mdi mdi-trash-can fs-3 text-danger"></i></a>
                            
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection