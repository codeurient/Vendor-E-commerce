@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Show Post</h4>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-success mx-1" href="{{ route('posts.create') }}">Create <i class="fa-solid fa-plus"></i></a>
                        <a class="btn btn-warning mx-1" href="">Trashed <i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <tbody>
                        <tr>
                            <td style="font-weight: bolder;">Id</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Image</td>
                            <td><img width="150" src="{{ asset($post->image) }}" alt=""></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Ttile</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Description</td>
                            <td>{{ $post->description }}</td>
                        </tr>


                        <tr>
                            <td style="font-weight: bolder;">Category</td>
                            <td>{{ $post->category->name }}</td>
                        </tr>


                        <tr>
                            <td style="font-weight: bolder;">Publish Date</td>
                            <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

