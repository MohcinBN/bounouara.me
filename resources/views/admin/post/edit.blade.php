@extends('layouts.master_')

@section('title')
  Edit post 
@endsection


@section('content')
 

            <main role="main" class="ccol-md-10 offset-md-1 pt-4">
                <h3>Edit this Post</h3>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col-md-12 pb-3">
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
                            <select name="cat_id" id="cat_id" class="form-control">
                            @foreach ($categories as $category)
                             <option value="{{ $category->id }}"{{ $category->id === $post->category_id ? ' selected' : '' }}>{{ $category->cat_name }}</option>
                            @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="selected">

                            <img src="" id="showed" width="500px" />
                            
                                                    
                        </div>
                        <button type="submit" class="btn btn-primary">update post</button>
                    </form>
                </div>
            </main>

@endsection
