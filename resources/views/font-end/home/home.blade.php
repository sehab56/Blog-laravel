@extends('font-end.master')

@section('title')
    Home
@endsection
@section('body')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        @foreach($sliders as $slider)
{{--                        <img src="{{ asset($slider->slider_image) }}" alt="" width="1900" height="1080" class="">--}}
                        <h3 class="text-success">{{ $slider->slider_heading }}</h3>
                        <p class="text-success">{{ $slider->slider_paragraph }}</p>
                        @endforeach
                    </div>
                </div>
               {{-- <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    </div>
                </div>--}}
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
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
