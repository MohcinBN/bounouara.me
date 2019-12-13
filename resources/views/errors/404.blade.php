@extends('layouts.master')

@section('title')
 Oooh sorry page not found
@endsection


@section('content')
<div class="container">
        <div class="row">
            <main role="main" class="col-md-12 text-center">
                <p style="font-size: 11rem;"><i class="fas fa-heart-broken"></i></p>
                    <h1>{{ $exception->getMessage() }}</h1>
                    <a href="{{ asset('/') }}">back to home</a>
            </main>
        </div>
    </div>
@endsection