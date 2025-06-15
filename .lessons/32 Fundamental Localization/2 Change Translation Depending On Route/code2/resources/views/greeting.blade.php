@extends('layouts.master')


@section('content')
    
    <div class="mt-4">
        <a href="{{ route('greeting', 'en') }}" class="btn btn-primary">English</a>
        <a href="{{ route('greeting', 'az') }}" class="btn btn-danger">Azerbaijan</a>
    </div>

    <div class="">
        <div class="display-3">{{ __('frontend.Welcome to our application!') }}</div>

        <p>{{ __('frontend.Laravel is a framework built using the PHP scripting language. PHP is an open-source server-side language.') }}</p>

        <div class="row">
            <ul class="row">
                <li>{{ __('frontend.Home') }}</li>
                <li>{{ __('frontend.About') }}</li>
                <li>{{ __('frontend.Contact') }}</li>
                <li>{{ __('frontend.More') }}</li>
            </ul>
        </div>
    </div>

@endsection