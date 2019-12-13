@extends('layouts.master')

@section('title')
  Bounouara.me </>
@endsection

@section('content')
<main role="main" class="container"  style="margin-top: 5px">



      <div class="row">
        <div class="col-md-12">
            
                @foreach($posts as $post)
                <div class="post">
                    <a href="{{ route('post.single', ['slug' => $post->slug]) }}"><h2>{{ $post->title }}</h2></a>
                    <time>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</time>
                    <p class="summary">{!! str_limit($post->description, 80) !!}</p>
                </div>
                 @endforeach

                 <!-- pagination -->
                 <div id="paged">
                  {{ $posts->links() }}
                 </div>
                 
        </div>
      </div>




</main><!-- /.container -->
@endsection