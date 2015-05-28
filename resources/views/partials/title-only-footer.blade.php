<div class="container">




	<div class="row">

		<div class="col-md-3 footer-logo">
			 <img src="{{asset('images/footer-logo.gif')}}" alt="Title Alt Attributes here"/>
			<span>Slogan of the company here</span>

	    <div class="language-drop">
	    <span>Language:</span>&nbsp; {!! Form::select('locale',['en'=>'English','ja'=>'日本語'], $locale, ['onchange'=>'document.location="/language/"+$(this).val();']) !!}
	    </div>

		</div>

		<div class="col-md-3 f-links">
			<h3>Company</h3>
			<ul class="list-unstyled">
				<li><a href="">About us</a></li>
				<li><a href="">Careers</a></li>				
				<li><a href="">Contact Us</a></li>
				<li><a href="">Terms of Use</a></li>
				<li><a href="">Privacy Policy</a></li>
			</ul>

		</div>

		<div class="col-md-3 f-links">
			<h3>Quick Links</h3>
			<ul class="list-unstyled">
				<li><a href="">Photos</a></li>
				<li><a href="">Find Pros</a></li>				
				<li><a href="">Shop </a></li>
				<li><a href="">Hotel </a></li>
				<li><a href="">Venues</a></li>
				<li><a href="">Photographer/Videographer</a></li>
			</ul>
		</div>

		<div class="col-md-3 f-links">
			&nbsp;
		</div>

	</div>

	<div class="row div-spacer">
		&nbsp;
	</div>
</div>

