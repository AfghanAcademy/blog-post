@extends('backend.layout.master')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Create Post
            </div>
            <div class="card-body">
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter the post title">
                        @error('title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" name="sub_title" class="form-control" placeholder="Enter the post subtitle">
                        @error('sub_title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control my-editor" cols="30" rows="10" placeholder="Enter the post description"></textarea>
                        @error('description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Topics:</label><br>
                       @foreach($topics as $topic)
                            {{ $topic->title }}
                            <input type="checkbox" value="{{$topic->id}}" class="mr-2" name="topic[]">
                       @endforeach
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                    
                </form>
            </div>
        </div>
            
        </div>
        <!-- /.container-fluid -->
@endsection
