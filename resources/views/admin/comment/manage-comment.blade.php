
@extends('admin.master')

@section('title')
    Manage Comment
@endsection

@section('body')

    <div class="card">
        <div class="card-body">
            <h5 class="text-center text-success">{{ Session('message') }}</h5>
            <table class="table table-bordered table-hover table-striped">
                <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Blog Title</th>
                    <th scope="col">Visitor Name</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Publication Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach( $comments as $comment)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $comment->blog_title }}</td>
                        <td>{{ $comment->first_name.' '.$comment->last_name}}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->publication_status == 1 ? 'Published' : 'Unpublished'  }}</td>
                        <td>
                            @if($comment->publication_status == 1)
                                <a href="{{ route('unpublished-comment',['id'=>$comment->id]) }}">Unpublished</a> ||
                            @else
                                <a href="{{ route('published-comment',['id'=>$comment->id]) }}">Published</a> ||
                            @endif
{{--                                <a href="{{ route('edit-blog',['id'=>$comment->id]) }}">Edit</a> ||--}}
                                <a href="" id="{{ $comment->id }}"
                                   onclick="event.preventDefault();
                                       var check=confirm('Are you sure to delete this!!!!!');
                                       if(check){
                                       document.getElementById('deleteCommentForm'+'{{ $comment->id }}').submit();
                                       }
                                       ">Delete</a>

                                <form id="deleteCommentForm{{ $comment->id }}" action="{{ route('delete-comment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $comment->id }}"/>
                                </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


