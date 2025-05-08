@extends('layouts.master')

@section('content')
  <main role="main" class="container">
    <div class="row mt-5">

      @foreach ($posts as $post)
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">

              <h4>{{ $post->title }}</h4>
              <p>{{ $post->description }}</p>

              <ul style="list-style-type: none; display:flex; gap:10px; flex-wrap:wrap;">
                
                @foreach ($post->tags as $tag)
                  <li style="color:blue; cursor:pointer;">{{ '#'.$tag->name }}</li>
                @endforeach
                
              </ul>

            </div>
          </div>
        </div>
      @endforeach

    </div>   

    <div style="margin-bottom: 100px !important;" class="my-5 d-flex justify-content-center"> 
      {{ $posts->links('pagination::bootstrap-5') }}  
    </div>
    
  </main>
@endsection