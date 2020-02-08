@extends('admin.master')

@section('title')
    Edit Category
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
                        <form action="{{ route('update-category')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"> Add Category</label>
                                    <input type="text" name="category_name" value="{{ $category->category_name}}" class="form-control" id="inputEmail4" >
                                    <input type="hidden" name="id" value="{{ $category->id}}"  class="form-control" id="inputEmail4" placeholder="Name">
                                    <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Manage Category</label>
                                    <textarea name="category_description" class="form-control">{{$category->category_description}}</textarea>
                                    <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : ''}} </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Publication Status</label>
                                <div class="col-md- ">
                                    <label><input type="radio" {{ $category->publication_status == 1 ? 'checked' : '' }} name="publication_status" value="1"/>Published</label>
                                    <label><input type="radio" {{ $category->publication_status == 0 ? 'checked' : '' }} name="publication_status" value="0"/>Unpublished</label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="submit" name="btn" class="form-control  btn btn-info float-right" value="Update Category">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

