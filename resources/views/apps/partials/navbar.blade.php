<div class="header" style="">
     <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" style="background: none" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img
                        src="{{{URL::asset('template/assets/images/logo.png')}}}"
                        alt="homepage"
                        class="dark-logo"
                        width="auto" height="50"
                    />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img
                        src="{{{URL::asset('template/assets/images/logo-text.png')}}}"
                        alt="homepage"
                        class="dark-logo"
                        width="auto" height="50"
                    />
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a
                class="
                    nav-toggler
                    waves-effect waves-light
                    d-block d-md-none
                "
                href="javascript:void(0)"
                ><i class="ti-menu ti-close"></i
            ></a>
        </div>
        <div class="">
            <div class="links ">
                <a href="{{route('index')}}">Beranda</a>
                <a href="#">Tentang Aplikasi</a>
                <a href="{{route('login')}}">Login</a>
            </div>
        </div>
     </nav>
</div>