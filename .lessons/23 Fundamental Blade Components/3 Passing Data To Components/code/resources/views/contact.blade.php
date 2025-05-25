@extends('layouts.master')

@section('content')

    <div class="row my-5 g-3 ">
        @foreach ($posts as $post)

           <x-post.index :post="$post"/>
      
        @endforeach
    </div>

@endsection