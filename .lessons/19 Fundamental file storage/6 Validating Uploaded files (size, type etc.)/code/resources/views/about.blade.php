@extends('layouts.master')

@section('content')

    <main role="main" class="container">
        <h1 class="mt-5 text-danger">About</h1>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur ratione quaerat vero a, ullam reiciendis earu.
    </main>


      
    <div class="text-center mt-4">
        <button class="btn btn-primary" id="load-more">Daha çox yüklə</button>
    </div>

@endsection


@section('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script>
      $('#load-more').on('click', function () {
          $.ajax({
              url: '',
              type: 'GET',
              success: function () {

              }
          });
      });
  </script>
@endsection