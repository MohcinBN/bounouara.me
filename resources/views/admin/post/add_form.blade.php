@extends('layouts.master_')

@section('title')
  Add new post 
@endsection

@section('content')


            <main role="main" class="col-md-10 offset-md-1 pt-4">
                <h2>Create New Post</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Auth::check())
                <div class="col-md-12 pb-3">
                    <form method="post" action="{{ route('post.form') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="id_title" name="title"
                                   aria-describedby="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="content" rows="3" name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cat_id">Category</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                    
                               @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                               @endforeach 

                            </select> 
                        </div>

                        <div class="form-group">
                                <input type="file" name="image" id="selected">

                                <img src="" id="showed" width="500px" />
                        </div>
                        <button type="submit" class="btn btn-primary">Publish <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                @endif
            </main>

@endsection
