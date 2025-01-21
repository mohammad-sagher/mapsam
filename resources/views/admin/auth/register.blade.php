<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.head')

</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
   @include('section.allert')
 <div id="wrapper">

	<div class="mx-auto my-4 card card-authentication1">
		<div class="card-body">
		 <div class="p-2 card-content">
		 	<div class="text-center">
		 		<img src="assets/images/logo-icon.png" alt="logo icon">
		 	</div>
		  <div class="py-3 text-center card-title text-uppercase">Sign Up Admin</div>
		    <form method="POST" action="{{ route('admin.register') }}">
			  @csrf
			  <div class="form-group">
			  <label for="exampleInputName" class="sr-only">Name</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputName" name="name" class="form-control input-shadow" placeholder="Enter Your Name">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputEmailId" class="sr-only">Email ID</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputEmailId" name="email" class="form-control input-shadow" placeholder="Enter Your Email ID">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputPassword" name="password" class="form-control input-shadow" placeholder="Choose Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <label for="exampleInputConfirmPassword" class="sr-only">Confirm Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputConfirmPassword" name="password_confirmation" class="form-control input-shadow" placeholder="Confirm Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
               <div class="form-group">
			   <label for="exampleInputPassword" class="sr-only">Admin_key</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputPassword" name="admin_key" class="form-control input-shadow" placeholder="Enter Admin Key">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>

			   <div class="form-group">
			     <div class="icheck-material-white">
                   <input type="checkbox" id="user-checkbox" checked="" />
                   <label for="user-checkbox">I Agree With Terms & Conditions</label>
			     </div>
			    </div>

			 <button type="submit" class="btn btn-light btn-block waves-effect waves-light"> Sign Up</button>
			  <div class="mt-3 text-center">Sign Up With</div>

			 <div class="mt-4 form-row">
			  <div class="mb-0 form-group col-6">
			   <a href="{{ route('github') }}" class="btn btn-light btn-block"><i class="fa fa-github-square"></i> Github</a>
			 </div>
			 <div class="mb-0 text-right form-group col-6">
			  <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
			 </div>
			</div>

			 </form>
		   </div>
		  </div>
		  <div class="py-3 text-center card-footer">
		    <p class="mb-0 text-warning">Already have an account? <a href="{{ route('admin.ShowLogin') }}"> Sign In here</a></p>
		  </div>
	     </div>
         @include('partials.colorSwitcher')

  @include('partials.js')

</body>
</html>
