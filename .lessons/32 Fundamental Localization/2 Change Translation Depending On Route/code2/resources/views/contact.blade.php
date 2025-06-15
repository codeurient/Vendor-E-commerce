@extends('layouts.master')

@section('content')

    <div class="row my-5 g-3 ">
        @foreach ($posts as $post)

            <x-post.index >
                <x-slot name="image">
                    {{ $post->image }}
                </x-slot>

                <x-slot name="title">
                    {{ $post->title }}
                </x-slot>

                <x-slot name="description">
                    {{ $post->description }}
                </x-slot>
            </x-post.index >
      
        @endforeach
    </div>

    {{-- <x-button > Submit </x-button >
    <x-button > <b>Submit</b> </x-button > --}}

@endsection