@extends('admin.master')

@section('title')
    Add Category
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
                        <form action="{{route('new-category')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail11"> Add Category</label>
                                    <input type="text" name="category_name" class="form-control" id="inputEmail11">
                                    <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail2">Manage Category</label>
                                    <textarea name="category_description"  class="form-control" id="inputEmail2"></textarea>
                                    <span class="text-danger">{{$errors->has('category_description') ? $errors->first('category_description') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Publication Status</label></br>
                                    <label><input type="radio" name="publication_status" id="inputEmail4" value="1"/>Published</label>
                                    <label><input type="radio" name="publication_status" id="inputEmail4" value="0"/>Unpublished</label></br>
                                    <span class="text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ''}} </span>
                                </div>
                            </div>
                            <div class="form-row">
{{--                                <div class="form-group col-md-10"></div>--}}
                                <div class="form-group col-md-12">
                                    <input type="submit" name="btn" class="form-control  btn btn-info float-right" value="Add Category">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

