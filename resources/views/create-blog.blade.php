@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="card p-5 col-md-6">
        <div class="card-header"><strong>Create Blog</strong></div>
        <br>
            @if(isset($blogCreated))
                
                <div class="alert alert-success">Blog Created Successfully</div>
                
            @endif
            <form action="{{url('/create-blog')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" placeholder="Enter Title">
                    @error('title')
                        <span style="color:red" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Description">{{old('description')}}</textarea>  
                    @error('description')
                        <span style="color:red" role="alert">
                            {{ $message }}
                        </span>
                    @enderror                  
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" id="image" value="{{old('image')}}" placeholder="Select Image">
                    @error('image')
                        <span style="color:red" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span style="color:red" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Create</button>
        </form>
        </div>
    </div>
    
</div>
@endsection
