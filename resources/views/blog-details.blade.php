@extends('layouts.app')
@section('categories')
    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('/')}}">All</a>
                        @foreach($categories as $category)
                        <a class="dropdown-item" href="{{url('/'.$category->id)}}">{{$category->name}}</a>
                        @endforeach
                    </div>
    </div>
@endsection
@section('content')
<div class="container">
    
    <div class="row">
    
        <div class="col-md-12 my-2">
            
            <div class="card">
                <div class="card-header"><strong>Author: {{$blog->user->name}}</strong></div>

                <div class="card-body">
                    <img class="img-fluid" src="{{ asset('/storage/'.$blog->image) }}" />
                    <hr/>
                    <h6 class="float-right">Category: {{$blog->category->name}}</h6>
                    <h5>{{$blog->title}}</h5><hr>
                    
                    <p>{{$blog->description}}</p>
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>
@endsection
