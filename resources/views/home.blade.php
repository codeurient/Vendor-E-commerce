@extends('layouts.master')

@section('content')
  <main role="main" class="container">

    <div class="row mt-5" id="post-container">
      @include('partials.posts') <!-- ilk 10 post -->
    </div>   
    
    @if ($posts->hasMorePages())
      <div class="text-center mt-4">
        <button class="btn btn-primary" id="load-more">Daha çox yüklə</button>
      </div>
    @endif

  </main>
@endsection

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script>

      function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return parseInt(urlParams.get(name)) || 1;

        return console.log(parseInt(urlParams.get(name)));
        
      }
      let page = getQueryParam('page')  ;

      $('#load-more').on('click', function () {
          page++;
          $.ajax({
              url: "?page=" + page,
              type: 'GET',
              success: function (data) {                
                  if (data.trim() == '') {
                      $('#load-more').hide();
                  } else {
                      $('#post-container').append(data);
                  }
              }
          });
      });

  </script>
@endsection