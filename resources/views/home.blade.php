@extends('master')
@section('header')
    @include('partials.default-header')
@endsection

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/showprofile.css')}}"/>
@endsection
@section('content')

    <!--
    <div class="row">
        Banner here...
    </div>

    <!-- Jumbotron -->
    <div class="container">

        <!--Welcome Content by KENT-->
        <div class="row">


            <div class="row div-spacer">
                &nbsp;
            </div>

            <div class="col-md-8">
                    <div class="talkbubble">
                      <textarea></textarea>
                    </div>

                    <div class="feed-box">
                        <div class="feed-img"><a href=""><img src="{{asset('images/sample-img-feeds_07.jpg')}}"></a></div>
                        <div class="feed-content">
                            <span>13 hours ago</span>
                            <a href="">WizardOnCouch bookmarked an ideabook: Wish List</a>
                        </div>
                        <div class="feed-likes">
                            <div class="likes-box"><a href=""><i class="fa fa-thumbs-up"></i> Like</a></div>
                            <div class="comments-box"><a href=""><i class="fa fa-comment"></i> Comment</a></div>
                        </div>
                    </div>

                    <div class="feed-box">
                        <div class="feed-img"><a href=""><img src="{{asset('images/sample-img-feeds_07.jpg')}}"></a></div>
                        <div class="feed-content">
                            <span>13 hours ago</span>
                            <a href="">WizardOnCouch bookmarked an ideabook: Wish List</a>
                        </div>
                        <div class="feed-likes">
                            <div class="likes-box"><a href=""><i class="fa fa-thumbs-up"></i> Like</a></div>
                            <div class="comments-box"><a href=""><i class="fa fa-comment"></i> Comment</a></div>
                        </div>
                    </div>

            </div>

            <div class="col-md-4">Sidebar Here...</div>

        </div>


        <!--End Welcome Content by KENT-->

        <p class="lead">{{Config::get('app.name')}} {{ trans('app.on_going') }}</p>

        @if(!isset($logged_user))
            <p>
                <a class="btn btn-lg btn-success" href="/signup" role="button"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;{{ trans('app.sign_up_with_email') }}</a>
                &nbsp;&nbsp;
                <a class="btn btn-lg btn-primary" href="/oauth/facebook" role="button"><i class="fa fa-facebook"></i>&nbsp;&nbsp;{{ trans('app.sign_in_with_facebook') }}</a>
            </p>
        @else
            <p>
                {{ trans('app.welcome') }} {{$logged_user->first_name}} {{$logged_user->last_name}}!!
            </p>
        @endif

                <div class="row div-spacer">
                    &nbsp;
                </div>
    </div>
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection

