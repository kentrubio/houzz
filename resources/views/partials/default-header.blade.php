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
                    <li><a href="/photos">Photos</a></li>
                    <li><a href="/find-photos">Find Photos</a></li>
                    <li><a href="/shop">Shop</a></li>
                    <li><a href="/category">Category</a></li>
                    <li><a href="/stories">Stories</a></li>
                    <li><a href="/advice">Advice</a></li>
                </ul>
            @endif
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                @if (isset($logged_user))
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Your Houzz <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#}}">{{$logged_user->first_name}} {{$logged_user->last_name}}</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="file-upload"><i class="fa fa-upload"></i>&nbsp;Upload Photo or File</a></li>
                            <li class="divider"></li>
                            <li><a href="signout">Sign Out&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/signin">Sign In</a></li>
                @endif
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
