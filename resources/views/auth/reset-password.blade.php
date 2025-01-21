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
                    <p class="pb-2">Please enter your email and new password to reset your account.</p>
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="position-relative has-icon-right">
                                <input type="email" id="email" name="email" class="form-control input-shadow"
                                    value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                                <div class="form-control-position">
                                    <i class="icon-envelope-open"></i>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="password" name="password" class="form-control input-shadow"
                                    required autocomplete="new-password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control input-shadow" required autocomplete="new-password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <button type="submit" class="mt-3 btn btn-light btn-block">Reset Password</button>
                    </form>
                </div>
            </div>
            <div class="py-3 text-center card-footer">
                <p class="mb-0 text-warning">Return to <a href="{{ route('login') }}">Sign In</a></p>
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
