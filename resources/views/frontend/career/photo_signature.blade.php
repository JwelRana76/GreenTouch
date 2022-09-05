@extends('layouts.frontend.career')
@section('career-content')
<section class="career">
    <div class="container">
      <div class="row">
        <h4 class="mb-5">Please fill in all required information step by step in each section.</h4>
        <div class="col-md-3">
          @php
            $a = 0;
          @endphp
          @include('frontend.career.sidebar')
        </div>
        <div class="col-md-9">
          <div class="container">
            <form action="{{ route('photo_signature.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  
                  <div class="col-md-12 col-sm-12 col-xl-12">
                    <div class="row g-3 align-items-center mb-4">
                        <table>
                            <thead>
                                <tr>
                                    <th>Picture</th>
                                    <th>Signature</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="file" name="picture" id="picture" class="form-control">
                                        <img src="{{ asset('storage/uploads/career').'/'.Auth::user()->personaldetails->picture }}" alt="Picture" width="40px" height="40px">
                                        <small class="text-danger">@error('picture'){{ $message }}@enderror</small>
                                    </td>
                                    <td>
                                        <input type="file" name="signature" id="signature" class="form-control">
                                        <img src="{{ asset('storage/uploads/career').'/'.Auth::user()->personaldetails->signature }}" alt="signature" width="150px" height="40px">
                                        <small class="text-danger">@error('signature'){{ $message }}@enderror</small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Save & Continue</button>
                  </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

{{-- @push('frontend_script')
<script>
  let fileName = @json(Auth::user()->personaldetails->picture ?? 'no_image.jpg');
  // Get a reference to our file input
  const fileInput = document.querySelector('#picture');

  // Create a new File object
  const picFile = new File([''], fileName, {
      lastModified: new Date(),
  });

  // Now let's create a DataTransfer to get a FileList
  const picTransfer = new DataTransfer();
  picTransfer.items.add(picFile);
  fileInput.files = picTransfer.files;


  let sig = @json(Auth::user()->personaldetails->signature ?? 'no_image.jpg');
  // Get a reference to our file input
  const signature = document.querySelector('#signature');

  // Create a new File object
  const myFile = new File([''], sig, {
      lastModified: new Date(),
  });

  // Now let's create a DataTransfer to get a FileList
  const dataTransfer = new DataTransfer();
  dataTransfer.items.add(myFile);
  signature.files = dataTransfer.files;
</script>
@endpush --}}