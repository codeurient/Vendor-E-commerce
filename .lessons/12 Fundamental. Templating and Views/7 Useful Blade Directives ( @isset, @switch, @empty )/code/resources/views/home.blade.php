@extends('layouts.master')

@section('content')
  <main role="main" class="container">
    <h1 class="mt-5 text-danger">Home</h1>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur ratione quaerat vero a, ullam reiciendis earu.
 
    <div class="row mt-5">

      @foreach ($blogs as $blog)
        @if ($blog['status'] == 1)
          <div class="col-md-4 mt-4">
            <div class="card">
              <div class="p-3">
                <h2>{{ $blog['title'] }}</h2>
                <p>{{ $blog['body'] }}</p>
              </div>
            </div>
          </div>
        @else
          <div class="col-md-4 mt-4">
            <div class="card">
              <div class="p-3">
                <h2>{{ $blog['title'] }}</h2>
                <p>{{ $blog['body'] }}</p>
                <div class="btn-sm btn-warning">Pending</div>
              </div>
            </div>
          </div>
        @endif
      @endforeach
      
    </div>

    @php
      $data = true;
    @endphp

    @isset($data)
      <div class="alert-success">Success</div>
    @endisset


    @php
      $i = 0;
    @endphp

    @switch($i)
      @case(1)
        <div class="alert-danger">Danger</div>
        @break
      @case(2)
        <div class="alert-success">Success</div>
        @break
      @default
        <div class="alert-warning">Warning</div>
    @endswitch

    
    
    @php
      $x = '';
    @endphp

    @empty($x)
      <div class="alert-success">This is empty</div>
    @endempty

  </main>
@endsection