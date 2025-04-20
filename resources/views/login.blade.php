@extends('layouts.master')

@section('content')
    
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <h2 class="mb-4">Login</h2>

            <div class="card">
                <div class="card-body">
                    {{-- 1) action="{{ route('login.submit') }}" method="POST"  --}}
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">User Name</label>
                            {{-- 2) name="name" --}}
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">User Email</label>
                            {{-- 3) name="email" --}}
                            <input name="email" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">User Password</label>
                            {{-- 4) name="password" --}}
                            <input name="password" type="text" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection