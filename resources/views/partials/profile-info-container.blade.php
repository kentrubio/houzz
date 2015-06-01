<div class="row">
	<div class="profile-box">
		<div class="row">
			<div class="col-md-4 col-md-offset-2 profile-name"><h2><a href="">{{$logged_user->first_name}} {{$logged_user->last_name}}</a></h2></div>

			<!--Profile Edit Details here-->
			<div class="">

			</div>
			<!--//Profile Edit Details here-->
		</div>
		
	</div>
	<div class="">
		<div class="profile-pic"><img src="{{asset('images/s-profile-pic.jpg')}}" alt="Logo Alt here"/></div>
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