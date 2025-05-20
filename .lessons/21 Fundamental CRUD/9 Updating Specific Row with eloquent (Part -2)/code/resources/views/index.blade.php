@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4>All Posts</h4>
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
                                    <a class="btn-sm btn btn-success" href="">Show</a>
                                    <a class="btn-sm btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                    <a class="btn-sm btn btn-danger" href="">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

