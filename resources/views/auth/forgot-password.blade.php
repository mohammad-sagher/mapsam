<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.head')

</head>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="height-100v d-flex align-items-center justify-content-center">
	<div class="mb-0 card card-authentication1">
		<div class="card-body">
		 <div class="p-2 card-content">
		  <div class="pb-2 card-title text-uppercase">Reset Password</div>
		    <p class="pb-2">Please enter your email address. You will receive a link to create a new password via email.</p>
		    <form method="POST" action="{{ route('password.email') }}">
			  @csrf
			  <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">Email Address</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputEmailAddress" name="email" class="form-control input-shadow" placeholder="Email Address">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>

			  <button type="submit" class="mt-3 btn btn-light btn-block">Reset Password</button>
			 </form>
		   </div>
		  </div>
		   <div class="py-3 text-center card-footer">
		    <p class="mb-0 text-warning">Return to the <a href="login.html"> Sign In</a></p>
		  </div>
	     </div>
	     </div>




	<!--start color switcher-->
   @include('partials.colorSwitcher')
  <!--end color switcher-->

	</div><!--wrapper-->

  <!-- Bootstrap core JavaScript-->
@include('partials.js')

</body>
</html>
