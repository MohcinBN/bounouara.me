@extends('layouts.master')


@section('title')
 {{ $post->title }}
@endsection

@section('content')
    <div class="container" id="app">
        <div class="row">
            <main role="main" class="col-md-12">
                <h1>{{ $post->title }}</h1>
                <time>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</time>
                <br>
                <img src="/upload/{{ $post->image }}" alt="blog post image" class="responsive-img line-d">
                <div class="col-md-12 blog-main">
                    <p>{!! $post->description !!}</p>
                </div>
                <div class="col-md-12 comments">
                    <div id="disqus_thread"></div>
                    <script>
                    
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                    var disqus_config = function () {
                    this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };

                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://bounouara.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                
                </div>
            </main>
        </div>
    </div>
@endsection


