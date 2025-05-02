@extends('layouts.master')

@section('content')
  <main role="main" class="container">
    <div class="row mt-5">


      {{-- @foreach ($users as $user)
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h4>{{ $user->name }}</h4>
              <p>{{ $user->email }}</p>

              <h4>{{ $user->address->address }}</h4>
              
            </div>
          </div>
        </div>
      @endforeach --}}


      @foreach ($addresses as $address)
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h4>{{ $address->u->name }}</h4>
            <p>{{ $address->u->email }}</p>

            <h4>{{ $address->address }}</h4>
            
          </div>
        </div>
      </div>
    @endforeach


    </div>    
  </main>
@endsection