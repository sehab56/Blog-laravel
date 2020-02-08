
@extends('admin.master')

@section('title')
    Manage Slider
@endsection

@section('body')

    <div class="card">
        <div class="card-body">
            <h5 class="text-center text-success">{{ Session('message') }}</h5>
            <table class="table table-bordered table-hover table-striped">
                <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Caption Heading</th>
                    <th scope="col">slider Paragraph</th>
                    <th scope="col">Publication Status</th>
                    <th scope="col">slider Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach( $sliders as $slider)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $slider->slider_heading }}</td>
                        <td>{{ $slider->slider_paragraph }}</td>
                        <td>{{ $slider->publication_status == 1 ? 'Published' : 'Unpublished'  }}</td>
                        <td><img src="{{ asset($slider->slider_image) }}" alt="" width="100" height="110"/></td>
                        <td>
                            <a href="{{ route('edit-slider',['id'=>$slider->id]) }}">Edit</a> ||
                            <a href="" id="{{ $slider->id }}"
                                   onclick="event.preventDefault();
                                   var check=confirm('Are you sure to delete this!!!!!');
                                   if(check){
                                   document.getElementById('deleteSliderForm'+'{{ $slider->id }}').submit();
                                   }
                                   ">Delete</a>

                            <form id="deleteSliderForm{{ $slider->id }}" action="{{ route('delete-slider') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $slider->id }}"/>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


