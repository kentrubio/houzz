@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <p class="lead">{{Config::get('app.name')}} on going.</p>

        @if(!isset($logged_user))
            <p>
                <a class="btn btn-lg btn-success" href="/signup" role="button"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Sign Up with Email</a>
                &nbsp;&nbsp;
                <a class="btn btn-lg btn-primary" href="/oauth/facebook" role="button"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Sign In with Facebook</a>
            </p>
        @else
            <p>
                Welcome {{$logged_user->first_name}} {{$logged_user->last_name}}!!
            </p>
        @endif
    </div>
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection

