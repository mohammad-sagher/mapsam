@extends('dashboard.master')

@section('title')
    Admin
@endsection

@section('sidebar')
    @include('partials.sidebarAdmin')
@endsection

@section('content')
    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="mt-3">
                <div id='calendar'></div>
            </div>

            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->

            <!--start color switcher-->
            <div class="right-sidebar">
                <div class="switcher-icon">
                    <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
                </div>
                <div class="right-sidebar-content">

                    <p class="mb-0">Gaussion Texture</p>
                    <hr>

                    <ul class="switcher">
                        <li id="theme1"></li>
                        <li id="theme2"></li>
                        <li id="theme3"></li>
                        <li id="theme4"></li>
                        <li id="theme5"></li>
                        <li id="theme6"></li>
                    </ul>

                    <p class="mb-0">Gradient Background</p>
                    <hr>

                    <ul class="switcher">
                        <li id="theme7"></li>
                        <li id="theme8"></li>
                        <li id="theme9"></li>
                        <li id="theme10"></li>
                        <li id="theme11"></li>
                        <li id="theme12"></li>
                        <li id="theme13"></li>
                        <li id="theme14"></li>
                        <li id="theme15"></li>
                    </ul>

                </div>
            </div>
            <!--end color switcher-->

        </div>
        <!-- End container-fluid-->
    </div>
    <!--End content-wrapper-->
@endsection
