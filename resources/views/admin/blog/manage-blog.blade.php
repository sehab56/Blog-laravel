
@extends('admin.master')

@section('title')
    Manage Blog
@endsection

@section('body')

    <div class="card">
        <div class="card-body">
            <h5 class="text-center text-success">{{ Session('message') }}</h5>
            <table class="table table-bordered table-hover table-striped">
                <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Add Category</th>
                    <th scope="col">Blog Title</th>
                    <th scope="col">Blog Short Description</th>
                    <th scope="col">Blog Image</th>
                    <th scope="col">Publication Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach( $blogs as $blog)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $blog->category_name }}</td>
                        <td>{{ $blog->blog_title }}</td>
                        <td>{{ $blog->blog_short_description }}</td>
                        <td><img src="{{ asset($blog->blog_image) }}" alt="" width="100" height="110"/></td>
                        <td>{{ $blog->publication_status == 1 ? 'Published' : 'Unpublished'  }}</td>
                        <td>
                            <a href="{{ route('edit-blog',['id'=>$blog->id]) }}">Edit</a> ||
                            <a href="" id="{{ $blog->id }}"
                               onclick="event.preventDefault();
                                   var check=confirm('Are you sure to delete this!!!!!');
                                   if(check){
                                   document.getElementById('deleteBlogForm'+'{{ $blog->id }}').submit();
                                   }
                                   ">Delete</a>

                            <form id="deleteBlogForm{{ $blog->id }}" action="{{ route('delete-blog') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $blog->id }}"/>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

