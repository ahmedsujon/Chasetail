<div>
    <header>
        <div class="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 col-lg-8 col-12">
                        <div class="logo">
                            <a href="{{ route('app.home') }}"><img class="img-fluid"
                                    src="{{ asset('assets/app/images/logo.png') }}" alt="Find Fido Fast"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-4 col-12">
                        <div class="top-menu">
                            <ul>
                                @if (Auth::user())
                                    <li><a href="index.html">
                                            @if (Auth::user()->avatar)
                                                <img class="img-fluid" style="height: 45px; width:45px;"
                                                    src="{{ asset(user()->avatar) }}" alt="Profile" />
                                            @else
                                                <img class="img-fluid" style="height: 45px; width:45px;"
                                                    src="{{ asset('assets/admin/images/avatar.png') }}"
                                                    alt="Profile" />
                                            @endif
                                        </a>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}">Sign-in</a></li>
                                    <li><a href="{{ route('register') }}">Sign-up</a></li>
                                @endif
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('user.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                        <span key="t-logout">Logout</span></a>
                                    <form id="logout-form" style="display: none;" method="POST"
                                        action="{{ route('user.logout') }}">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Menu -->
    <div class="main-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{ route('app.home') }}">Home</a></li>
                        <li><a href="{{ route('app.aboutus') }}">About Us</a></li>
                        <li><a href="{{ route('app.lost.dogs') }}">Lost Dogs</a></li>
                        <li><a href="{{ route('app.found.dogs') }}">Found Dogs</a></li>
                        <li><a href="{{ route('app.pricing') }}">Pricing</a></li>
                        <li><a href="{{ route('app.donation') }}">Donation</a></li>
                        <li><a href="{{ route('app.contact') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
