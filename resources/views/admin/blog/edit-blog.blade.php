@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('body')
    {{--
    <div class="card" >
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    --}}
    <div class="card">

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto ">
                        <h5 class="text-center text-success">{{ Session('message') }}</h5>
                        <form action="{{ route('update-blog') }}" method="post" name="editBlogForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"> Add Category</label>
                                    <select name="category_id" class="form-control" id="inputEmail4">
                                        <option>-----select category name-----</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail5"> Blog Title</label>
                                    <input type="text" name="blog_title" value="{{ $blog->blog_title }}" class="form-control" id="inputEmail5">
                                    <input type="hidden" name="id" value="{{ $blog->id }}" class="form-control" id="inputEmail5">
                                    <span class="text-danger">{{$errors->has('blog_title') ? $errors->first('blog_title') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail6">Blog Short Description</label>
                                    <textarea name="blog_short_description" class="form-control" id="inputEmail6">{{ $blog->blog_short_description }}</textarea>
                                    <span class="text-danger">{{$errors->has('blog_short_description') ? $errors->first('blog_short_description') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail7">Blog Long Description</label>
                                    <textarea name="blog_long_description" class="form-control" id="inputEmail7">{{ $blog->blog_long_description }}</textarea>
                                    <span class="text-danger">{{$errors->has('blog_logn_description') ? $errors->first('blog_logn_description') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail8">Blog Image</label></br>
                                    <input type="file" name="blog_image" accept="image/*" id="inputEmail8"></br>
                                    <img src="{{ asset($blog->blog_image) }}" alt="" height="110" width="100"/>
                                    <span class="text-danger">{{$errors->has('blog_image') ? $errors->first('blog_image') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail9">Publication Status</label></br>
                                    <label><input type="radio" {{ $blog->publication_status == 1 ? "checked":"" }} name="publication_status" id="inputEmail9" value="1"/>Published</label>
                                    <label><input type="radio" {{ $blog->publication_status == 0 ? "checked":"" }} name="publication_status" id="inputEmail9" value="0"/>Unpublished</label>
                                    <span class="text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ''}} </span>
                                </div>
                            </div>
                            <div class="form-row">
                                {{--                                <div class="form-group col-md-10"></div>--}}
                                <div class="form-group col-md-12">
                                    <input type="submit" name="btn" class="form-control  btn btn-info float-right" value="Update Blog">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editBlogForm'].elements['category_id'].value='{{ $blog->category_id }}';
    </script>
@endsection


