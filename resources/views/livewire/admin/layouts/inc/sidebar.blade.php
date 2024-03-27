<div>
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Menu</li>

                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboard">Dashboard</span>
                        </a>
                    </li>

                    @if (isAdminPermitted('users_manage') || isAdminPermitted('admins_manage'))
                        <li class="menu-title" key="t-user">Dogs</li>
                    @endif
                    @if (isAdminPermitted('users_manage'))
                        <li>
                            <a href="{{ route('admin.lost.dogs') }}" class="waves-effect">
                                <i class="bx bx-user"></i>
                                <span key="t-chat">Lost Dogs</span>
                            </a>
                        </li>
                    @endif
                    @if (isAdminPermitted('admins_manage'))
                        <li>
                            <a href="{{ route('admin.found.dogs') }}" class="waves-effect">
                                <i class="bx bx-user"></i>
                                <span key="t-chat">Found Dogs</span>
                            </a>
                        </li>
                    @endif

                    @if (isAdminPermitted('users_manage') || isAdminPermitted('admins_manage'))
                        <li class="menu-title" key="t-user">Customers</li>
                    @endif
                    @if (isAdminPermitted('users_manage'))
                        <li>
                            <a href="{{ route('admin.allUsers') }}" class="waves-effect">
                                <i class="bx bx-user"></i>
                                <span key="t-chat">Customers</span>
                            </a>
                        </li>
                    @endif

                    @if (isAdminPermitted('users_manage') || isAdminPermitted('admins_manage'))
                        <li class="menu-title" key="t-user">Donations</li>
                    @endif
                    @if (isAdminPermitted('users_manage'))
                        <li>
                            <a href="{{ route('admin.donations') }}" class="waves-effect">
                                <i class="bx bx-user"></i>
                                <span key="t-chat">Donations</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.subscriptions') }}" class="waves-effect">
                                <i class="bx bx-user"></i>
                                <span key="t-chat">Subscriptions</span>
                            </a>
                        </li>
                    @endif

                    @if (isAdminPermitted('users_manage') || isAdminPermitted('admins_manage'))
                        <li class="menu-title" key="t-user">User</li>
                    @endif
                    @if (isAdminPermitted('admins_manage'))
                        <li>
                            <a href="{{ route('admin.allAdmins') }}" class="waves-effect">
                                <i class="bx bx-user"></i>
                                <span key="t-chat">All Admins</span>
                            </a>
                        </li>
                    @endif

                    @if (isAdminPermitted('settings_manage'))
                        <li class="menu-title" key="t-setting">Setting</li>
                        <li>
                            <a href="#" class="waves-effect">
                                <i class="bx bx-wrench"></i>
                                <span key="t-chat">Settings</span>
                            </a>
                        </li>
                    @endif

                    @if (isAdminPermitted('settings_manage'))
                        <li class="menu-title" key="t-setting">Reports</li>
                        <li class="">
                            <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                                <i class="bx bx-detail"></i>
                                <span key="t-blog">Reports</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false" style="height: 0px;">
                                <li><a href="blog-list.html" key="t-blog-list">Lost Dog Report</a></li>
                                <li><a href="blog-grid.html" key="t-blog-grid">Found Dog Report</a></li>
                                <li><a href="blog-details.html" key="t-blog-details">Donation Report</a></li>
                                <li><a href="blog-details.html" key="t-blog-details">Subscription Report</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
