@extends('layouts.master_')

@section('title')
  Edit category 
@endsection

@section('content')


            <main role="main" class="col-md-10 offset-md-1 pt-4">
                <h2>Edit Cat</h2>
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
                    <form method="post" action="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Category name</label>
                            <input type="text" class="form-control" id="" name="cat_name"
                                   aria-describedby="title" value="{{ $category->cat_name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update it <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                @endif
            </main>

@endsection
