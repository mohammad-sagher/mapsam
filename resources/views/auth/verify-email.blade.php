<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')


</head>
<body>

</body>
</html>


<div class="mt-3 row">
  <div class="mx-auto col-lg-6">
    <div class="card">
      <div class="card-body">
        <div class="text-center card-title">{{ __('Verify Email') }}</div>
        <hr>
        <div class="alert alert-info">
          {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
          <div class="alert alert-success">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
          </div>
        @endif

        <div class="mt-4 d-flex justify-content-between align-items-center">
          <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">
              <i class="zmdi zmdi-mail-send"></i> {{ __('Resend Verification Email') }}
            </button>
          </form>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
              <i class="zmdi zmdi-power"></i> {{ __('Log Out') }}
            </button>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

@include('partials.colorSwitcher')
@include('partials.js')
@include('partials.backToTopButten')
