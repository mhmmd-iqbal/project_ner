<header class="topbar" style="background: #0b6631" data-navbarbg="skin5" >
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
                    <!-- Light Logo icon -->
                    <img
                        src="{{{URL::asset('template/assets/images/logo.png')}}}"
                        alt="homepage"
                        class="light-logo"
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
                    />
                    <!-- Light Logo text -->
                    <img
                        src="{{{URL::asset('template/assets/images/logo-text.png')}}}"
                        class="light-logo"
                        alt="homepage"
                        height="50"

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
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
            style="background: none"
        >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box">
                    <a
                        class="nav-link waves-effect waves-dark"
                        href="javascript:void(0)"
                        ><i class="ti-search"></i
                    ></a>
                    <form class="app-search position-absolute">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search &amp; enter"
                        />
                        <a class="srh-btn"
                            ><i class="ti-close"></i
                        ></a>
                    </form>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a
                        class="
                            nav-link
                            dropdown-toggle
                            text-muted
                            waves-effect waves-dark
                            pro-pic
                        "
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="{{Auth::user()->image ?? URL::asset('template/assets/images/users/1.jpg')}}"
                            alt="user"
                            class="rounded-circle"
                            width="31"
                        />
                    </a>
                    <ul
                        class="
                            dropdown-menu dropdown-menu-end
                            user-dd
                            animated
                        "
                        aria-labelledby="navbarDropdown"
                    >
                        <a
                            class="dropdown-item"
                            href="javascript:void(0)"
                            ><i class="ti-user m-r-5 m-l-5"></i> My
                            Profile</a
                        >

                        <a
                            class="dropdown-item"
                            href="javascript:void(0)"
                            ><i
                                class="
                                    ti-settings
                                    m-r-5 m-l-5
                                "
                            ></i>
                            Account Setting</a
                        >
                        <a
                            class="dropdown-item"
                            href="{{route('logout')}}"
                            ><i
                                class="
                                    fa fa-power-off
                                    m-r-5 m-l-5
                                "
                            ></i>
                            Logout</a
                        >
                    </ul>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>