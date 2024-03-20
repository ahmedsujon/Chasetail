<div>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-8 col-7">
                        <div class="top-menu2">
                            <ul>
                                <li><a href="#">Lost Dogs</a></li>
                                <li><a href="#">Found Dogs</a></li>
                                <li><a href="#">Contact With Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-5">
                        <div class="top-menu">
                            <ul>
                                @if (Auth::user())
                                    @if (Auth::user()->avatar)
                                        <li><a href="index.html"><img class="img-fluid"
                                                    src="{{ asset('assets/app/images/profile.png') }}"
                                                    alt="Profile" /></a>
                                        </li>
                                    @else
                                        <li><a href="index.html"><img class="img-fluid"
                                                    src="{{ asset('assets/app/images/profile.png') }}"
                                                    alt="Profile" /></a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a href="/login" wire:navigate>Sign-in</a>
                                    </li>
                                    <li>
                                        <a href="/register" wire:navigate>Sign-up</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bot">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-4 col-6">
                        <div class="logo">
                            <a href="/" wire:navigate><img class="img-fluid"
                                    src="{{ asset('assets/app/images/logo.png') }}" alt="Find Fido Fast"></a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-6">

                        <div class="menu-btn">
                            <i class="fas fa-bars"></i>
                        </div>
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <nav class="navbar navbar-expand-lg">
                                            <div class="container-fluid">
                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#navbarSupportedContent"
                                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                                    aria-label="Toggle navigation">
                                                    <span class="navbar-toggler-icon"></span>
                                                </button>
                                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"
                                                        style="flex-direction: row-reverse;">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#">Pricing</a>
                                                        </li>
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#"
                                                                id="navbarDropdown" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Partners
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                <li><a class="dropdown-item" href="#">Drop-down
                                                                        Page Title</a></li>
                                                                <li><a class="dropdown-item" href="#">Drop-down
                                                                        Page Title</a></li>
                                                                <li><a class="dropdown-item" href="#">Drop-down
                                                                        Page Title</a></li>
                                                                <li><a class="dropdown-item" href="#">Drop-down
                                                                        Page Title</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#"
                                                                id="navbarDropdown" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                About
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                <li><a class="dropdown-item" href="#">Drop-down
                                                                        Page Title</a></li>
                                                                <li><a class="dropdown-item" href="#">Drop-down
                                                                        Page Title</a></li>
                                                                <li><a class="dropdown-item" href="#">Drop-down
                                                                        Page Title</a></li>
                                                                <li><a class="dropdown-item" href="#">Drop-down
                                                                        Page Title</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-4 col-12">
                        <div class="top-donate">
                            <a href="#">Donate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="side-bar">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <div class="menu">
            <div class="item"><a href="index.html"><i class="fas fa-desktop"></i>Home</a></div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-table"></i>About<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-cogs"></i>Partners<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                </div>
            </div>
            <div class="item"><a href="#"><i class="fas fa-info-circle"></i>Pricing</a></div>
        </div>
    </div>
</div>
