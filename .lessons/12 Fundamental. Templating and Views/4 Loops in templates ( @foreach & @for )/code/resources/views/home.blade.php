@extends('layouts.master')

@section('content')

  <main role="main" class="container">
    <h1 class="mt-5 text-danger">Home</h1>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur ratione quaerat vero a, ullam reiciendis earu.
 
 
    <div class="row mt-5">

      @foreach ($blogs as $blog)
        <div class="col-md-4 mt-4">
          <div class="card">
            <div class="p-3">
              <h2>{{ $blog['title'] }}</h2>
              <p>{{ $blog['body'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
      

      @for ($i = 0; $i < count($blogs); $i++)
        <div class="col-md-4 mt-4">
          <div class="card">
            <div class="p-3">
              <h2>{{ $blogs[$i]['title'] }}</h2>
              <p>{{ $blogs[$i]['body'] }}</p>
            </div>
          </div>
        </div>
      @endfor


    </div>

  </main>

@endsection