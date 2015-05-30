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

                    <!--LOGIN-->


                     <!--<p class="lead">{{Config::get('app.name')}} {{ trans('app.on_going') }}</p>-->

                    @if(!isset($logged_user))
                        <p>
                            <a class="btn btn-lg btn-success" href="/signup" role="button"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;{{ trans('app.sign_up_with_email') }}</a>
                            &nbsp;&nbsp;
                            <a class="btn btn-lg btn-primary" href="/oauth/facebook" role="button"><i class="fa fa-facebook"></i>&nbsp;&nbsp;{{ trans('app.sign_in_with_facebook') }}</a>
                        </p>
                    @else
                       <!-- <p>
                            {{ trans('app.welcome') }} {{$logged_user->first_name}} {{$logged_user->last_name}}!!
                        </p>-->

                        <div class="home-buble-in">
                            <h3 class="content-title">What's on your mind today?</h3>
                            <div class="s-prof-pic"><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a></div>

                            <div class="bubble-boxh">
                                <div class="talkbubble">
                                  <textarea></textarea>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!--//END LOGIN-->

                    <!--box for pure text post-->
                    <div class="home-feed">
                        <div class="title-h-feed">
                            <div class="feed-prof"><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a> <a class="name-l" href="">John Doe</a></div>
                            <span>1 hour ago</span>
                        </div>
                        <div class="feat-story">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        </div>
                        <div class="feed-likes">
                            <div class="likes-box"><a href=""><i class="fa fa-thumbs-up"></i> Like</a></div>
                            <div class="comments-box"><a href=""><i class="fa fa-comment"></i> Comment</a></div>
                        </div>
                    </div>
                    <!--box for pure text post-->

                    <!--box for Recommended Photos post collection-->
                    <div class="home-feed">
                        <div class="title-h-feed">
                            <div class="feed-prof"><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a> <a class="name-l" href="">John Doe</a></div>
                            <span>1 hour ago</span>
                        </div>
                        <div class="am-container" id="am-container">
                            <a href="#"><img src="{{asset('images/b.jpg')}}"></img></a>
                            <a href="#"><img src="{{asset('images/a.jpg')}}"></img></a>
                            <a href="#"><img src="{{asset('images/c.jpg')}}"></img></a>
                        </div>
                    </div>
                     <!--box for Photos collection-->

                     <!--box for featured articles-->
                    <div class="home-feed">
                        <div class="title-h-feed">
                            <div class="feed-prof"><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a> <a class="name-l" href="">Featured stories</a></div>
                            <span>1 hour ago</span>
                        </div>
                        <div class="feat-story">
                            <a href="#"><img src="{{asset('images/b.jpg')}}"></img></a>
                            <div class="post-desc">
                                <div class="post-title">
                                <a href=""><h2>Title of the Story Here</h2></a>
                                <span>Author:<a href="">Jimboy Boknoy</a></span>
                                </div>
                                <div class="post-button"><a class="btn btn-default content-btn" href="#" role="button">Read More</a></div>
                            </div>
                        </div>
                    </div>
                     <!--box for featured articles-->



            </div>

            <!--SIDEBAR-->
            <div class="col-md-4">

                <div class="side-btn-box">
                <a class="btn btn-default content-btn" href="#" role="button"><i class="fa fa-plus-square-o fa-2x"></i> Add Wedding Ideas</a>
                </div>

                <div class="side-btn-box">
                <a class="btn btn-default content-btn" href="#" role="button"><i class="fa fa-upload fa-2x"></i> Upload Photos</a>
                </div>



                <div class="side-btn-box who-flw-bx">
                <h3>Who to Follow</h3>
                <div class="to-follow-list">
                    <ul class="list-unstyled">
                        <li><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a> <a class="light-green left-pad-dhs" href="">John Doe</a>  <a class="btn btn-default follow-s-btn" href="#" role="button"><i class="fa fa-plus-circle fa-2x"></i> Follow</a> </li>
                        <li><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a> <a class="light-green left-pad-dhs" href="">Jimmy Walker</a>  <a class="btn btn-default follow-s-btn" href="#" role="button"><i class="fa fa-plus-circle fa-2x"></i> Follow</a> </li>
                        <li><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a> <a class="light-green left-pad-dhs" href="">Steven Seabird</a>  <a class="btn btn-default follow-s-btn" href="#" role="button"><i class="fa fa-plus-circle fa-2x"></i> Follow</a> </li>
                        <li><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a> <a class="light-green left-pad-dhs" href="">Chuckie Chiki</a>  <a class="btn btn-default follow-s-btn" href="#" role="button"><i class="fa fa-plus-circle fa-2x"></i> Follow</a> </li>
                        <li><a href=""><img src="{{asset('images/small-profile-pic.png')}}"></a> <a class="light-green left-pad-dhs" href="">Grant Hill</a>  <a class="btn btn-default follow-s-btn" href="#" role="button"><i class="fa fa-plus-circle fa-2x"></i> Follow</a> </li>

                    </ul>
                </div>
                </div>

            <!--ADVERTS AREA-->
            <div class="ads-box">
                <h2>ADVERTISEMENT SPACE HERE...</h2>
            </div>
            <!--ADVERTS AREA-->


            </div>
            <!--//END SIDEBAR-->
        </div>


        <!--End Welcome Content by KENT-->


                <div class="row div-spacer">
                    &nbsp;
                </div>
    </div>
@endsection        
@section('footer')
    @include('partials.title-only-footer')
@endsection
@section('page_js')
    <script type="text/javascript" src="{{URL::asset('js/jquery.montage.min.js')}}"></script>
        <script type="text/javascript">
            $(function() {
                /* 
                 * just for this demo:
                 */
                $('#showcode').toggle(
                    function() {
                        $(this).addClass('up').removeClass('down').next().slideDown();
                    },
                    function() {
                        $(this).addClass('down').removeClass('up').next().slideUp();
                    }
                );
                $('#panel').toggle(
                    function() {
                        $(this).addClass('show').removeClass('hide');
                        $('#overlay').stop().animate( { left : - $('#overlay').width() + 20 + 'px' }, 300 );
                    },
                    function() {
                        $(this).addClass('hide').removeClass('show');
                        $('#overlay').stop().animate( { left : '0px' }, 300 );
                    }
                );
                
                var $container  = $('#am-container'),
                    $imgs       = $container.find('img').hide(),
                    totalImgs   = $imgs.length,
                    cnt         = 0;
                
                $imgs.each(function(i) {
                    var $img    = $(this);
                    $('<img/>').load(function() {
                        ++cnt;
                        if( cnt === totalImgs ) {
                            $imgs.show();
                            $container.montage({
                                fillLastRow             : true,
                                alternateHeight         : true,
                                alternateHeightRange    : {
                                    min : 90,
                                    max : 240
                                }
                            });
                            
                            /* 
                             * just for this demo:
                             */
                            $('#overlay').fadeIn(500);
                        }
                    }).attr('src',$img.attr('src'));
                }); 
                
            });
        </script>
@endsection

