@extends('layouts.master')

@section('content')

    <x-language-switcher /> 


    <h1>{{ __('frontend.welcome') }}</h1>


    <p><a href="{{ url(app()->getLocale() . '/about') }}">{{ __('frontend.about') }}</a></p>

@endsection
