@extends('font-end.master')

@section('title')
    Sign Up
@endsection
@section('body')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
{{--        <h1 class="mt-4 mb-3">{{ $blog->blog_title }}--}}
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('/') }}">Home</a>
            </li>
        </ol>

        <div class="row">

            <div class="col-lg-8">

                <!-- Preview Image -->
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 mx-auto ">
                                    <h5 class="text-center text-success">{{ Session('message') }}</h5>
                                    <form action="{{ route('new-sign-up') }}" method="post" >
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail5">First Name</label>
                                                <input type="text" name="first_name" class="form-control" id="inputEmail5">
                                                <span class="text-danger">{{$errors->has('first_name') ? $errors->first('first_name') : ''}} </span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail6">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" id="inputEmail6">
                                                <span class="text-danger">{{$errors->has('last_name') ? $errors->first('last_name') : ''}} </span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail7">Email Address</label>
                                                <input type="email" name="email_address" class="form-control" id="inputEmail7">
                                                <span class="text-danger">{{$errors->has('email_address') ? $errors->first('email_address') : ''}} </span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail8">Password</label>
                                                <input type="password" name="password" class="form-control" id="inputEmail8">
                                                <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}} </span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail9">Phone Number</label>
                                                <input type="number" name="phone_number" class="form-control" id="inputEmail9">
                                                <span class="text-danger">{{$errors->has('phone_number') ? $errors->first('phone_number') : ''}} </span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail20">Address</label>
                                                <textarea name="address" class="form-control" id="inputEmail20"></textarea>
                                                <span class="text-danger">{{$errors->has('address') ? $errors->first('address') : ''}} </span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10"></div>

                                            <div class="form-group col-md-12">
                                                <input type="submit" name="btn" class="form-control  btn btn-info float-right" value="Register">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                         <button class="btn btn-secondary" type="button">Go!</button> </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('category-blog',['id'=>$category->id]) }}">{{ $category->category_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


