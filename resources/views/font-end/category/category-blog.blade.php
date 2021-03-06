@extends('font-end.master')

@section('title')
    Category Blog
@endsection
@section('body')


    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome to our Blogs</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset($blog->blog_image) }}" alt="" width="250" height="250" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->blog_title }}</h4>
                            <p class="card-text">{{ $blog->blog_short_description }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('blog-details',['id'=>$blog->id]) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection

