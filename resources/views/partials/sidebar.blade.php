<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div
                        class="
                            user-profile
                            d-flex
                            no-block
                            dropdown
                            m-t-20
                        "
                    >
                        <div class="user-pic">
                            <img
                                src="{{Auth::user()->image ?? URL::asset('template/assets/images/users/1.jpg')}}"
                                alt="users"
                                class="rounded-circle"
                                width="40"
                            />
                        </div>
                        <div class="user-content hide-menu m-l-10">
                            <a
                                href="#"
                                class=""
                                id="Userdd"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <h5
                                    class="
                                        m-b-0
                                        user-name
                                        font-medium
                                    "
                                >
                                    {{Auth::user()->name}}
                                    {{-- <i class="fa fa-angle-down"></i> --}}
                                </h5>
                                <span class="op-5 user-email"
                                    >{{Auth::user()->email}}</span
                                >
                            </a>
                            {{-- <div
                                class="
                                    dropdown-menu dropdown-menu-end
                                "
                                aria-labelledby="Userdd"
                            >
                                <a
                                    class="dropdown-item"
                                    href="javascript:void(0)"
                                    ><i
                                        class="ti-user m-r-5 m-l-5"
                                    ></i>
                                    My Profile</a
                                >
                                
                                <div class="dropdown-divider"></div>
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
                                <div class="dropdown-divider"></div>
                                <a
                                    class="dropdown-item"
                                    href="{{route('index')}}"
                                    ><i
                                        class="
                                            fa fa-power-off
                                            m-r-5 m-l-5
                                        "
                                    ></i>
                                    Logout</a
                                >
                            </div> --}}
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
            
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                        "
                        href="{{route('dashboard')}}"
                        aria-expanded="false"
                        ><i class="mdi mdi-view-dashboard"></i
                        ><span class="hide-menu">Dashboard</span></a
                    >
                </li>
                
                <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                            {{(request()->is('user*')) ? 'active' : ''}}
                        "
                        href="{{route('user.index')}}"
                        aria-expanded="false"
                        ><i class="mdi mdi-account-multiple"></i
                        ><span class="hide-menu">Data User</span></a
                    >
                </li>
                {{-- <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                        "
                        href="{{route('quotation.index')}}"
                        aria-expanded="false"
                        ><i class="mdi mdi-format-quote"></i
                        ><span class="hide-menu">Data Model Kutipan</span></a
                    >
                </li> --}}
                <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                        "
                        href="{{route('document.index')}}"
                        aria-expanded="false"
                        ><i class="mdi mdi-book-multiple-variant"></i
                        ><span class="hide-menu">Document Skripsi</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                        "
                        href="pages-profile.html"
                        aria-expanded="false"
                        ><i class="mdi mdi-settings"></i
                        ><span class="hide-menu">Profile</span></a
                    >
                </li>
                {{-- <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                        "
                        href="table-basic.html"
                        aria-expanded="false"
                        ><i class="mdi mdi-border-all"></i
                        ><span class="hide-menu">Table</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                        "
                        href="icon-material.html"
                        aria-expanded="false"
                        ><i class="mdi mdi-face"></i
                        ><span class="hide-menu">Icon</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                        "
                        href="starter-kit.html"
                        aria-expanded="false"
                        ><i class="mdi mdi-file"></i
                        ><span class="hide-menu">Blank</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                        class="
                            sidebar-link
                            waves-effect waves-dark
                            sidebar-link
                        "
                        href="error-404.html"
                        aria-expanded="false"
                        ><i class="mdi mdi-alert-outline"></i
                        ><span class="hide-menu">404</span></a
                    >
                </li> --}}
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>