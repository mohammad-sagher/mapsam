@extends('dashboard.master')
@section('title')
    doctor
@endsection

@section('sidebar')
    @include('partials.sidebarAccountat')
@endsection

@section('content')
<div class="clearfix"></div>
<div class="content-wrapper" style="min-height: 100vh;"> <!-- يضمن أن تكون المحتويات كاملة في ارتفاع الشاشة -->
    <div class="container-fluid">
        <div class="mt-3 row">
            <div class="col-lg-4">
                <div class="card profile-card-2" style="height: 100%;"> <!-- استخدام 100% للإرتفاع -->
                    <div class="card-img-block">
                        <img class="img-fluid" src="https://via.placeholder.com/800x500" alt="Card image cap">
                    </div>
                    <div class="pt-5 card-body">
                        <img src="https://via.placeholder.com/110x110" alt="profile-image" class="profile">
                        <h5 class="card-title">{{ $profile->username ?? Auth::guard('doctor')->user()->name }}</h5>
                        <p class="card-text">{{ Auth::guard('doctor')->user()->email }}</p>
                        <div class="icon-block">
                            <a href="javascript:void();"><i class="text-white fa fa-facebook bg-facebook"></i></a>
                            <a href="javascript:void();"><i class="text-white fa fa-twitter bg-twitter"></i></a>
                            <a href="javascript:void();"><i class="text-white fa fa-google-plus bg-google-plus"></i></a>
                        </div>
                    </div>

                    <div class="card-body border-top border-light">
                        @foreach (['HTML5' => 65, 'Bootstrap 4' => 50, 'AngularJS' => 70, 'React JS' => 35] as $skill => $percentage)
                        <div class="media align-items-center">
                            <div><img src="{{ asset('assets/images/timeline/' . strtolower(str_replace(' ', '-', $skill)) . '.svg') }}" class="skill-img" alt="skill img"></div>
                            <div class="ml-3 text-left media-body">
                                <div class="progress-wrapper">
                                    <p>{{ $skill }} <span class="float-right">{{ $percentage }}%</span></p>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" style="width:{{ $percentage }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="icon-envelope-open"></i> <span class="hidden-xs">Messages</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#recent-activity" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-calendar-check"></i> <span class="hidden-xs">Activity</span></a>
                            </li>
                        </ul>
                        <div class="p-3 tab-content">
                            <div class="tab-pane active" id="profile">
                                <h5 class="mb-3">User Profile</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>About</h6>
                                        <p>{{ $profile->about ?? 'No about' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Recent badges</h6>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">{{ $profile->Recent_badges ?? 'No recent badges' }}</a>
                                        <hr>
                                        <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                                        <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                                        <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                                    </div>
                                    <div class="col-md-12">
                                        <h5 class="mt-2 mb-3"><span class="float-right fa fa-clock-o ion-clock"></span> Recent Activity</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $profile->recent_activity ?? 'No recent activity' }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Messages Tab -->
                            <div class="tab-pane" id="messages">
                                <div class="alert alert-info alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <div class="alert-icon">
                                        <i class="icon-info"></i>
                                    </div>
                                    <div class="alert-message">
                                        <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            <tr><td><span class="float-right font-weight-bold">3 hrs ago</span> Here is your link to the latest summary report from the..</td></tr>
                                            <tr><td><span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account..</td></tr>
                                            <tr><td><span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor.</td></tr>
                                            <tr><td><span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros.</td></tr>
                                            <tr><td><span class="float-right font-weight-bold">9/4</span> Maxamillion is the fix for tibulum tincidunt ullamcorper eros.</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Recent Activity Tab -->
                            <div id="recent-activity" class="tab-pane fade">
                                <form action="{{ route('doctor.updateActivity') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="recent_badges">Recent Badges</label>
                                        <textarea class="form-control" name="Recent_badges" rows="4" placeholder="Enter recent badges"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="recent_activity">Recent Activity</label>
                                        <textarea class="form-control" name="recent_activity" rows="4" placeholder="Enter recent activity"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="hobbies">Hobbies</label>
                                        <textarea class="form-control" name="hobbies" rows="4" placeholder="Enter your hobbies"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="about">About</label>
                                        <textarea class="form-control" name="about" rows="4" placeholder="Tell us about yourself"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Activity</button>
                                </form>
                            </div>

                            <!-- Edit Tab -->
                            <div class="tab-pane" id="edit">

                                <form action="{{ route('doctor.updateData') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                        <div class="col-lg-9"><input class="file" name="image" type="file" accept="image/*" id="image"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                        <div class="col-lg-9"><input class="form-control" name="phone" type="text" value="{{ $profile->phone ?? Auth::guard('doctor')->user()->phone }}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                        <div class="col-lg-9"><input class="form-control" name="address" type="text" value="{{ $profile->address ?? Auth::guard('doctor')->user()->address }}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                        <div class="col-lg-9"><input class="form-control" name="username" type="text" value="{{ $profile->username ?? Auth::guard('doctor')->user()->name }}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="reset" class="btn btn-secondary" value="Cancel">
                                            <input type="submit" class="btn btn-primary" value="Save Changes">
                                        </div>
                                    </div>
                                </form>
                                <form  action="{{ route('doctor.updatePassword') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Current Password</label>
                                        <div class="col-lg-9"><input class="form-control" name="current_password" type="password"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                        <div class="col-lg-9"><input class="form-control" name="password" type="password"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Confirm Password</label>
                                        <div class="col-lg-9"><input class="form-control" name="password_confirmation" type="password"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="reset" class="btn btn-secondary" value="Cancel">
                                            <input type="submit" class="btn btn-primary" value="Save Changes New Password">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay toggle-menu"></div>
</div>
@endsection

