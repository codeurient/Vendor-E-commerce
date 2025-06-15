@extends('layouts.master')


@section('content')

    <h1>{{ __('frontend.about') }}</h1>

    <a href="{{ url(app()->getLocale()) }}">{{ __('frontend.welcome') }}</a>

@endsection