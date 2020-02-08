
@extends('admin.master')

@section('title')
    Manage Category
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
                    <th scope="col">Manage Category</th>
                    <th scope="col">Publication Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach( $categories as $category)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->category_description }}</td>
                        <td>{{ $category->publication_status ==1 ? 'Published' : 'Unpublished'  }}</td>
                        <td>
                            <a href="{{ route('edit-category',['id'=>$category->id]) }}">Edit</a> ||
                            <a href="" id="{{ $category->id }}"
                               onclick="event.preventDefault();
                               var check=confirm('Are you sure to delete this!!!!!');
                               if(check){
                               document.getElementById('deleteCategoryForm'+'{{ $category->id }}').submit();
                               }
                               ">Delete</a>

                            <form id="deleteCategoryForm{{ $category->id }}" action="{{ route('delete-category') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $category->id }}"/>

                            </form>
{{--                            <a href="{{ route('delete-category',['id'=>$category->id]) }}" onclick="return('Are you sure to delete');">Delete</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

