@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header mb-4">
                <div class="row">
                    <div class="col-md-6">   <h4>All Posts</h4>    </div>

                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-success mx-1" href="">Back</a>
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
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td> <img width="70" height="70" src="https://wallpapers.com/images/hd/newsroom-background-1680-x-1050-e5gdpttd5j7n8ch0.jpg" alt=""> </td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia at nisi explicabo nulla cupiditate.</td>
                            <td>News</td>
                            <td>02.05.2025</td>
                            <td>
                                <a class="btn-sm btn btn-success" href="">Show</a>
                                <a class="btn-sm btn btn-primary" href="{{ route('') }}">Edit</a>
                                <a class="btn-sm btn btn-danger" href="">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection