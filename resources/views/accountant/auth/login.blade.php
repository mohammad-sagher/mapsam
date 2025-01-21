<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

</body>
</html>
@include('partials.head')

</head>
@include('section.allert')
<div class="mt-3 row">
    <div class="col-lg-6">
       <div class="card">
         <div class="card-body">
         <div class="card-title">Accountant Login</div>
         <hr>
          <form action="{{route('accountant.Login')}}" method="post">
            @csrf
         <div class="form-group">
          <label for="input-2">Email</label>
          <input type="text" name="email" class="form-control" id="input-2" placeholder="Enter Your Email Address" value="{{old('email')}}">
         </div>

         <div class="form-group">
          <label for="input-4">Password</label>
          <input type="text" name="password" class="form-control" id="input-4" placeholder="Enter Password" value="{{old('password')}}">
         </div>

         <div class="py-2 form-group">
           <div class="icheck-material-white">
          <button type="submit" class="px-5 btn btn-light"><i class="icon-lock"></i> Login</button>
        </div>
        </form>
       </div>
       </div>
    </div>
    @include('partials.colorSwitcher')
            @include('partials.footer')
    <!--end color switcher-->

      @include('partials.js')

</html>
