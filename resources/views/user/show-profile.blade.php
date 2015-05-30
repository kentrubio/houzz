@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/showprofile.css')}}"/>
@endsection

@section('content')
    <div class="container">
        @include('partials.profile-info-container')
        <div class="row">
           <div class="col-md-2">
            <a class="btn btn-default content-btn" href="#" role="button"><i class="fa fa-user-plus fa-2x"></i> Invite Friends</a>
            <div class="follow-box">
                <a class="btn btn-default no-brder-btm" href="#" role="button"><span>1,987</span> Follower</a>
                <a class="btn btn-default" href="#" role="button"><span>15,677</span>  Following</a>
            </div>

            <!--ADVERTS AREA-->
            <div class="ads-box">
                <h2>ADVERTISEMENT SPACE HERE...</h2>
            </div>
            <!--ADVERTS AREA-->

           </div>

           <div class="col-md-7">

                <h3 class="content-title"><a href="">(2) Wedding Ideas</a></h3>
                <div class="row wedding-idea">

                    <a class="overlay green text-center upload-photo" href="">
                        <i class="fa fa-plus fa-5x"></i>
                        <span>Add New Idea</span>
                    </a>

                    <a class="overlay green" href="">
                    <img src="{{asset('images/sample-wedding-idea_03.jpg')}}">
                    <span>image title here...</span>
                    </a>

                    <a class="overlay green" href="">
                    <img src="{{asset('images/sample-wedding-idea_03.jpg')}}">
                    <span>image title here...</span>
                    </a>

                </div>



                <div class="row div-spacer">
                    &nbsp;
                </div>

                <h3 class="content-title">Your Updates</h3>

                <div class="feeds-container">

                    <div class="home-buble-in">
                        <h3 class="content-title">What's on your mind today?</h3>
                        <div class="s-prof-pic"><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a></div>

                        <div class="bubble-boxh">
                            <div class="talkbubble">
                              <textarea></textarea>
                            </div>
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
           </div>


           <div class="col-md-3">
            <a class="btn btn-default content-btn" href="#" role="button"><i class="fa fa-upload fa-2x"></i> Upload Photos</a>
            <!--ADVERTS AREA-->
            <div class="ads-box">
                <h2>ADVERTISEMENT SPACE HERE...</h2>
            </div>
            <!--ADVERTS AREA-->

            <!--ADVERTS AREA-->
            <div class="ads-box">
                <h2>ADVERTISEMENT SPACE HERE...</h2>
            </div>
            <!--ADVERTS AREA-->
            
           </div>


        </div>
        
                <div class="row div-spacer">
                    &nbsp;
                </div>

    </div>

@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
