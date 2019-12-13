<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/blog.css') }}">
    <!--<link href="https://fonts.googleapis.com/css?family=Alice&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ URL::to('css/fontawesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script type="text/javascript" src="{{ URL::to('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/summernote-bs4.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('css/summernote-bs4.css') }}">

    @yield('styles')

        <script>
            $(document).ready(function() {
                $('#content').summernote({
                    height:300,
                });
                
            });
        </script>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="/admin">Blog Administration <i class="fas fa-users-cog"></i></a> 
        <a class="navbar-brand" href="/">Blog Home Page <i class="fas fa-home"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
    
                    <a class="nav-link dropdown-toggle"  id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Hello; {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        @guest
                        <a class="dropdown-item" href="{{ route('register') }}">Sign up</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Sign in</a>
                        @else
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </li>
            </ul>
        </div>
    </nav>
@yield('content')




<script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/main.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('scripts')
</body>
</html>