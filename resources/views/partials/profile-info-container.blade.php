
<div class="row">
	<div class="profile-box">
		<div class="row">
			<div class="col-md-4 col-md-offset-2 profile-name"><h2><a href="">{{$logged_user->first_name}} {{$logged_user->last_name}}</a></h2></div>

			<!--Profile Edit Details here-->
			<div class="col-md-6">
                @if($logged_user->id == $user->id)
					<div class="my-data-edit">
	                    <!--I'm viewing my own data.-->
	                   	<a class="btn btn-default content-btn white-txt" href="/file-upload" role="button"><i class="fa fa-pencil fa-2x white-txt"></i> Edit Profile</a>
	                   	<span><a href="">Preview your public profile <i class="fa fa-chevron-right"></i></a></span>
                   	</div>
                @else
                	<div class="my-data-edit">
                    <!--I'm viewing someone else's data.-->
	                    <div>
	                    	<ul class="list-inline social-top">
	                    		<li><a href=""><i class="fa fa-facebook-official fa-2x white-txt "></i></a></li>
	                    		<li><a href=""><i class="fa fa-twitter fa-2x white-txt "></i></a></li>
	                    		<li><a href=""><i class="fa fa-google-plus fa-2x white-txt "></i></a></li>
	                    	</ul>
	                    </div>
	                   	<a class="btn btn-default content-btn margin-left white-txt" href="/file-upload" role="button">Following</a>
	                   	<a class="btn btn-default content-btn white-txt" href="/file-upload" role="button">Message</a>
                   	</div>
                @endif
			</div>
			<!--//Profile Edit Details here-->
		</div>
		
	</div>
	<div class="">
		<div class="profile-pic"><img src="{{$user->avatar}}" alt="Logo Alt here"/></div>
		<nav class="navbar navbar-inverse sub-link">
		  <div class="container-fluid adjst-left">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-9" aria-expanded="false" style="height: 1px;">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Your Feeds</a></li>
		        <li><a href="#">Wedding Ideas</a></li>
		        <li><a href="#">Bookmarks</a></li>
		        <li><a href="#">Activity</a></li>
		        <li><a href="#">Messages</a></li>
		        <li><a href="#">Purchases</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
</div>