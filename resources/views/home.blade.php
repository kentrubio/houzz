@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="margin-top:50px;">
        <p class="lead">Rockstar project on going.</p>

        <p>
            <a class="btn btn-lg btn-success" href="/signup" role="button">Sign Up with Email</a>
            <a class="btn btn-lg btn-primary" href="/oauth/facebook" role="button">Sign Up with Facebook</a>
        </p>
    </div>
@endsection

