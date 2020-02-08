@extends('font-end.master')

@section('title')
  Blog Details
@endsection
@section('body')
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->

        <h5 class="text-center text-success">{{ Session('message') }}</h5>
        <h1 class="mt-4 mb-3">{{ $blog->blog_title }}
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('/') }}">Home</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-lg-8">
                <!-- Preview Image -->
                <img src="{{ asset($blog->blog_image) }}" alt="" height="500" width="730" class="img-fluid rounded">
                <hr>
                <!-- Date/Time -->
                <p>Posted on {{ $blog->created_at }}</p>
                <hr>
                <!-- Post Content -->
                <p class="lead">{{ $blog->blog_long_description }}</p>
                <blockquote class="blockquote">
                     <footer class="blockquote-footer">Someone famous in
                        <cite title="Source Title">Source Title</cite>
                    </footer>
                </blockquote>
                @if( $visitorId = Session::get('visitorId'))
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form action="{{ route('new-comment') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="visitor_id" value="{{ $visitorId }}" class="form-control">
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}" class="form-control">
                                <textarea class="form-control" name="comment" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                @else
                    <div class="card my-4">
                        <div class="card-body">
                            <h5 class="card-title">You have to login to comment this blog. if you are register then <a href="{{ route('visitor-login') }}">Login</a> or
                                <a href="{{ route('sign-up') }}">Sign-Up</a></h5>
                        </div>
                    </div>
                @endif
                <!-- Single Comment -->
                @foreach($comments as $comment)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="{{ asset($blog->blog_image) }}" alt="" height="30" width="30">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->first_name.' '.$comment->last_name }}</h5>
                            <p style="font-size:10px">Time: {{ $comment->created_at }}</p>
                            <p class="d-flex mr-2 rounded-circle">{{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
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
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
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
