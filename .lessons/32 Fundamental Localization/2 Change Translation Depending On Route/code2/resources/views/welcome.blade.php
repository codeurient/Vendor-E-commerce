@extends('layouts.master')

@section('content')

    <h1>{{ __('frontend.welcome') }}</h1>

    <ul>
        <li><a href="{{ url('az/') }}">AZ</a></li>
        <li><a href="{{ url('en/') }}">EN</a></li>
    </ul>

    <p><a href="{{ url(app()->getLocale() . '/about') }}">{{ __('frontend.about') }}</a></p>

@endsection
