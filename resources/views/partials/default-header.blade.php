 <!--Header-->
<div class="container">
        <div class="row head-box">
            <div class="col-md-3">
                    <img src="{{asset('images/sample-logo.png')}}" alt="Logo Alt here"/>
            </div>

            <div class="col-md-4 s-top-b">
                <div class="input-group">
                  <span class="input-group-btn">
                    <button class="btn btn-default top-s-btn" type="button"><i class="fa fa-2x fa-search white-txt"></i></button>
                  </span>
                  <input type="text" class="form-control" placeholder="Search for...">
                </div><!-- /input-group -->
            </div>

          
            <!--<div class="col-md-3 col-md-offset-1 s-top-c pull-right">
                <div class="row">
                    <div class="col-md-1 col-md-offset-1 s-top-ca"><i class="fa fa-shopping-cart fa-2x light-green"></i></div>
                    <div class="col-md-9 s-top-cb">
                        <img src="{{asset('images/small-profile-pic.png')}}" alt="Your Name here">
                        <a class="user-top" href="">John Doe</a>
                    </div>
                </div>
            </div>-->
            
        </div>
</div>
        <!--Header-->

<!--  navbar -->
<nav class="navbar navbar-default bg-light-green no-m-btm">
    <div class="container no-pad-left">


        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse head-nav no-pad-left">
            @if(!(isset($no_nav) && $no_nav))
                <ul class="nav navbar-nav">
                    <li class="bg-dark-green"><a href="/photos"><i class="fa fa-photo white-txt fa-2x"></i> {{ trans('app.photos') }}</a></li>
                    <li class="bg-dark-green"><a href="/shop"><i class="fa fa-search-plus white-txt fa-2x"></i> Find Pros</a></li>
                    <li class="bg-dark-green"><a href="/shop"><i class="fa fa-tag white-txt fa-2x"></i> {{ trans('app.shop') }}</a></li>
                    <li class="bg-light-green"><a href="/shop">Hotel</a></li>
                    <li class="bg-light-green"><a href="/stories">Venues</a></li>
                    <li class="bg-light-green"><a href="/advice">Photographer/Videographer</a></li>
                        
                    <!--
                    <li><a href="/photos">{{ trans('app.photos') }}</a></li>
                    <li><a href="/find-photos">{{ trans('app.find_photos') }}</a></li>
                    <li><a href="/shop">{{ trans('app.shop') }}</a></li>
                    <li><a href="/category">{{ trans('app.categories') }}</a></li>
                    <li><a href="/stories">{{ trans('app.stories') }}</a></li>
                    <li><a href="/advice">{{ trans('app.advice') }}</a></li>
                    -->

                </ul>
            @endif
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                @if (isset($logged_user))
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ trans('app.your_app') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>{!! Html::link("/@". $logged_user->username, $logged_user->first_name. ' '. $logged_user->last_name)!!}</li>
                            <li>{!! Html::link("/profile/edit", trans('app.edit_profile'))  !!}</li>
                            <li><a href="/file-upload"><i class="fa fa-upload"></i>&nbsp;{{ trans('app.upload_photo_or_file') }}</a></li>
                            <li class="divider"></li>
                            <li><a href="/signout">{{ trans('app.sign_out') }}&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/signin"> {{ trans('app.sign_in') }}</a></li>
                @endif
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
