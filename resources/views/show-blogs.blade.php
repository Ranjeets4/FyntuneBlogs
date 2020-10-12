@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(empty($blogs))
        <div class="alert alert-info">You have no blogs. Create Some blogs.</div>
    @else
    <table class="table border">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Update</th>
            
            <th scope="col">Delete</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $key=>$blog)
            <tr>
            <th scope="row">{{$key+1}}</th>
            <td><img class="img-fluid" src="{{ asset('/storage/'.$blog->image)}}" width="100px" height="100px"/></td>
            
            <td><a href="{{ url('/show-blog-details/'.$blog->id) }}">{{$blog->title}}</a></td>
            <td>{{$blog->description}}</td>
            <td>{{$blog->category->name}}</td>
            <td><a href="{{ url('/update-blog/'.$blog->id) }}">Update</a></td>
            <td><a href="{{ url('/delete-blog/'.$blog->id) }}">Delete</a></td>
            
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
</div>
@endsection
