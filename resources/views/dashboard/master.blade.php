<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @yield('title')

</head>


<body class="bg-theme bg-theme1">
    @include('section.allert')

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        @yield('sidebar')

        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        @include('partials.header')
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <!--Start Dashboard Content-->


                @yield('content')

                <!--End Dashboard Content-->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        @include('partials.backToTopButten')
        <!--End Back To Top Button-->

        <!--Start footer-->
        @include('partials.footer')
        <!--End footer-->

        <!--start color switcher-->
        @include('partials.colorSwitcher')
        <!--end color switcher-->

    </div><!--End wrapper-->


    <!-- Bootstrap core JavaScript-->
    @include('partials.js')

</body>

</html>
