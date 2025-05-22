@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Trashed Posts</h4>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-success mx-1" href="{{ route('posts.create') }}">Create <i class="fa-solid fa-plus"></i></a>
                        <a class="btn btn-warning mx-1" href="">Trashed <i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 10%">Image</th>
                            <th scope="col" style="width: 20%">Title</th>
                            <th scope="col" style="width: 30%">Description</th>
                            <th scope="col" style="width: 10%">Category</th>
                            <th scope="col" style="width: 10%">Publish Date</th>
                            <th scope="col" style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td> <img width="70" height="70" src="{{ asset($post->image) }}" alt=""> </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category_id }}</td>
                                <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                                
                                <td>
                                    <div class="d-flex">
                                        <a class="btn-sm btn btn-success me-2" href="{{ route('posts.restore', $post->id)  }}">Restore</a>

                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection