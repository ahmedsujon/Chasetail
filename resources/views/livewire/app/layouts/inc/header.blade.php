<div>
    <header>
        <div class="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 col-lg-7 col-12">
                        <div class="logo">
                            <a href="{{ route('app.home') }}"><img class="img-fluid" src="{{ asset('assets/app/images/logo.png') }}"
                                    alt="Find Fido Fast"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-5 col-12">
                        <div class="row">
                            <div class="col-md-7 col-lg-7 col-7">
                                <div class="top-menu">
                                    <ul>
                                        <li><a href="{{ route('login') }}">Sign-in</a></li>
                                        <li><a href="{{ route('register') }}">Sign-up</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-5 col-lg-5 col-5">
                                <div class="my-account">
                                    <ul>
                                        <li><a href="index.html"><img class="img-fluid"
                                                    src="{{ asset('assets/app/images/profile.jpg') }}"
                                                    alt="Profile" /></a></li>
                                    </ul>
                                </div>
                            </div>

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
