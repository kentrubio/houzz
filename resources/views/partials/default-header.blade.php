<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{Config::get('app.name')}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            @if(!(isset($no_nav) && $no_nav))
                <ul class="nav navbar-nav">
                    <li><a href="/photos">{{ trans('app.photos') }}</a></li>
                    <li><a href="/find-photos">{{ trans('app.find_photos') }}</a></li>
                    <li><a href="/shop">{{ trans('app.shop') }}</a></li>
                    <li><a href="/category">{{ trans('app.categories') }}</a></li>
                    <li><a href="/stories">{{ trans('app.stories') }}</a></li>
                    <li><a href="/advice">{{ trans('app.advice') }}</a></li>
                </ul>
            @endif
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                @if (isset($logged_user))
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ trans('app.your_app') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>{!! Html::link("/@". $logged_user->username, $logged_user->first_name. ' '. $logged_user->last_name)!!}</li>
                            <li>{!! Html::link("/edit-profile", trans('app.edit_profile'))  !!}</li>
                            <li><a href="/file-upload"><i class="fa fa-upload"></i>&nbsp;{{ trans('app.upload_photo_or_file') }}</a></li>
                            <li class="divider"></li>
                            <li><a href="signout">{{ trans('app.sign_out') }}&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a></li>
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
