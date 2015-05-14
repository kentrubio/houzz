@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1432247920426766";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="margin-top:50px;">
        <p class="lead">Rockstar project on on going.</p>

        <p>
            <a class="btn btn-lg btn-success" href="/signup" role="button">Sign Up with Email</a>
            <a class="btn btn-lg btn-primary"  role="button">Sign Up with Facebook</a>

{{--        <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false"
             data-auto-logout-link="false"></div>--}}
        </p>
    </div>
@endsection

