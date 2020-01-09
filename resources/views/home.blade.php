@extends('layouts.master_3')

@section('title')
  Blog Administration 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Posts
                    <a href="{{ route('post.form') }}">
                        <button type="button" class="btn btn-primary btn-sm">Create A New Blog Post <i class="fas fa-plus"></i></button>
                    </a>
                </h1>
                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                            <div id="message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Featured Image</th>
                        <th>Actions</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($posts)
                        @foreach($posts as $post)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $post->title }}</td>
                                <th>
                                    <img src="/upload/{{ $post->image }}" alt="" width="80px" height="80px">
                                </th>
                                <td>
                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    / 
                                    <a data-confirm='Are you sure you want to delete this post ?' href="{{ route('post.delete', ['id' => $post->id]) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</td>
                                <td>{{ Carbon\Carbon::parse($post->updated_at)->format('d-m-Y')  }}</td>
                            </tr>
                        @endforeach
                    @else
                        <p class="text-center text-primary">No Posts created Yet!</p>
                    @endif
                </table><Br>
                    {{ $posts->links() }}
            </main>
        </div>
    </div>


    <script>
$(document).ready(function(){
    $('[data-confirm]').on('click', function(e){
        e.preventDefault(); //cancel default action

        //Recuperate href value
        var href = $(this).attr('href');
        var message = $(this).data('confirm');

        //pop up
        swal({
            title: "Are you sure  you want to delete this post??",
            text: message, 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Your post has been deleted!", {
              icon: "success",
            });
            window.location.href = href;
          } else {
            swal("Your post is not deleted");
          }
        });
    });
});
    </script>

@endsection