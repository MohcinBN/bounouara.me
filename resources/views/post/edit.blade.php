@extends('layouts.master_2')

@section('title')
  Edit post 
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-md-9">
                <h1>Edit Post</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col-md-12">
                    <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="id_title" name="title"
                                   aria-describedby="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="content" rows="5" name="description">{{ $post->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="selected">

                            <img src="" id="showed" width="500px" />
                            
                                                    
                        </div>
                        <button type="submit" class="btn btn-primary">update post</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
