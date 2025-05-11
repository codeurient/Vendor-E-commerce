@extends('layouts.master')

@section('content')

  <main role="main" class="container">
    <div class="col-md-4 mt-5">
      <div class="card">
        <div class="card-body">

          <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data">
            
            @csrf

            <div class="form-group">
              <label for="" class="mb-2">Upload</label>
              <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success mt-2">Submit</button>
            </div>

          </form>

          <img src="" alt="">
          
          <img class="mt-3" width="200" height="200" src="{{ asset('storage\images\my_own_image_name.jpg') }}">

        </div>
      </div>
    </div>
  </main>

@endsection