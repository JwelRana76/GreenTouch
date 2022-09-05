@extends('layouts.backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Gallery Section</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="label-control">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($gallery as $key=>$gallery)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <img src="{{ asset('storage/uploads/gallery').'/'.$gallery->image }}" alt="Slider" width="100" height="60">
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure..??')" href="{{ route('admin.gallery.show',$gallery->id) }}" class=""><i class="mdi mdi-trash-can fs-3 text-danger"></i></a>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Data Found</td>
                    </tr>
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