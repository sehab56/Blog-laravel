@extends('admin.master')

@section('title')
    Edit Slider
@endsection

@section('body')

    <div class="card">

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto ">
                        <h5 class="text-center text-success">{{ Session('message') }}</h5>
                        <form action="{{route('update-slider')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail12"> Caption Heading</label>
                                    <input type="text" name="slider_heading" value="{{ $slider->slider_heading }}" class="form-control" id="inputEmail12">
                                    <input type="hidden" name="id" value="{{ $slider->id }}" class="form-control" id="inputEmail12">
                                    <span class="text-danger">{{$errors->has('slider_heading') ? $errors->first('slider_heading') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail7"> Caption Paragraph</label>
                                    <textarea name="slider_paragraph" class="form-control" id="inputEmail7">{{ $slider->slider_paragraph }}</textarea>
                                    <span class="text-danger">{{$errors->has('slider_paragraph') ? $errors->first('slider_paragraph') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail9">Publication Status</label></br>
                                    <label><input type="radio" {{ $slider->publication_status == 1 ? "checked":"" }} name="publication_status" id="inputEmail9" value="1"/>Published</label>
                                    <label><input type="radio" {{ $slider->publication_status == 0 ? "checked":"" }} name="publication_status" id="inputEmail9" value="0"/>Unpublished</label>
                                    <span class="text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ''}} </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail11"> Slider Image</label></br>
                                    <input type="file" name="slider_image" alt="image/*" id="inputEmail11"></br>
                                    <img src="{{ asset($slider->slider_image) }}" alt="" width="100" height="100"/>
                                    <span class="text-danger">{{$errors->has('slider_image') ? $errors->first('slider_image') : ''}} </span>
                                </div>
                            </div>
                            <div class="form-row">
                                {{--                                <div class="form-group col-md-10"></div>--}}
                                <div class="form-group col-md-12">
                                    <input type="submit" name="btn" class="form-control  btn btn-info float-right" value="Update Slider">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



