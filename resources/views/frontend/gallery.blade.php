@extends('layouts.frontend.extend')
@section('frontend_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Galary</h2>
        <ol>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li>Galary</li>
        </ol>
      </div>

    </div>
</section><!-- End Breadcrumbs -->
<section>
  <div class="container">
    <!-- Gallery -->
    <div class="row">

      @foreach ($galleries as $gallery)
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
          <img id="gallery_img" src="{{ asset('storage/uploads/gallery').'/'.$gallery->image }}" class="gallery_img w-100 shadow-1-strong rounded mb-4" alt="{{ $gallery->image }}"/>
        </div>
      @endforeach

    </div>
    <div class="m-auto">
      {!! $galleries->links() !!}
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="img01">
      <div id="caption"></div>
    </div>
    <!-- Gallery -->
  </div>
</section>
@endsection

@push('frontend_script')
<script>
  

  $(document).on('click','#gallery_img', function (e) {
    e.preventDefault();
    // Get the modal
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  });
  $(document).on('click','.close', function (e) {
    e.preventDefault();
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
  });
  </script>
@endpush