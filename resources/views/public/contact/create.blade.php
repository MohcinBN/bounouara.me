@extends('layouts.master')

@section('title')
 Contact
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <main role="main" class="col-md-12">

                <h2>Hey, feel free to use this form to contact me</h2>
                <br>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/contact" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input id="" class="form-control" type="text" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="" class="form-control" type="text" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="" cols="30" rows="10" class="form-control" value="{{ old('message') }}"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary blogBtn">Send Message</button>

                    </div>

                </form>
            </main>
        </div>
    </div>
@endsection
