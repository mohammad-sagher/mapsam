<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.head')

</head>
@include('section.allert')


<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="mx-auto my-5 card card-authentication1">
		<div class="card-body">
		 <div class="p-2 card-content">
		 	<div class="text-center">
		 		<img src="assets/images/logo-icon.png" alt="logo icon">
		 	</div>
		  <div class="py-3 text-center card-title text-uppercase">Sign In</div>
		    <form method="POST" action="{{ route('login') }}">
			  @csrf
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Username" name="email">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password" name="password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row">
			 <div class="form-group col-6">
			   <div class="icheck-material-white">
                <input type="checkbox" id="user-checkbox" checked="" name="remember" />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
			 <div class="text-right form-group col-6">
			  <a href="{{ route('password.request') }}">Reset Password</a>
			 </div>
			</div>
			 <button type="submit" class="btn btn-light btn-block">Sign In</button>
			  <div class="mt-3 text-center">Sign In With</div>

			 <div class="mt-4 form-row">
			  <div class="mb-0 form-group col-6">
			   <a href="{{ route('github') }}" class="btn btn-light btn-block"><i class="fa fa-github-square"></i> Github</a>
			 </div>
			 <div class="mb-0 form-group col-6">
			  <a href="{{ route('google') }}" class="btn btn-light btn-block"><i class="fa fa-google"></i> Google</a>
			 </div>
			</div>
			 </form>
		   </div>
		  </div>
		  <div class="py-3 text-center card-footer">
		    <p class="mb-0 text-warning">Do not have an account? <a href="{{ route('register') }}"> Sign Up here</a></p>
		  </div>
	     </div>

  @include('partials.colorSwitcher')

  <!--end color switcher-->

	@include('partials.js')
