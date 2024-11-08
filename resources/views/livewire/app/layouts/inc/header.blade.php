<div>
    <style>
        .nav-link.active {
            color: #007AE2 !important;
        }

        .img-fluid {
            max-width: 80% !important;
        }

        .custom-dropdown-menu {
            border-radius: 0.25rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 16px !important;
        }

        .custom-dropdown-item {
            font-size: 16px !important;
            transition: background-color 0.3s ease;
            padding-top: 10px !important;
        }

        .custom-dropdown-item span {
            font-size: 16px !important;
            line-height: 30px;
        }
    </style>
    <header>
        <div class="header-bot">
            <div class="container-fluid">
                <div class="row align-items-center">

                    <div class="col-md-6 col-lg-3 col-6">
                        <div class="logo">
                            <a href="{{ route('app.home') }}" ><img class="img-fluid"
                                    src="{{ asset('assets/app/images/logo.png') }}" alt="Chase Tail"></a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-7 col-6">
                        <div class="menu-btn">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <div class="container-fluid">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent"
                                        style="flex-direction: row-reverse;">
                                        <ul class="navbar-nav mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="{{ request()->routeIs('app.home') ? 'nav-link active' : 'nav-link' }}"
                                                   href="{{ route('app.home') }}">Chasetail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->routeIs('app.subscription') ? 'nav-link active' : 'nav-link' }}"
                                                    href="{{ route('app.subscription') }}">Pricing</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->routeIs('app.how.its.work') ? 'nav-link active' : 'nav-link' }}"
                                                   href="{{ route('app.how.its.work') }}">How It Works?</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->routeIs('app.lost.dogs') ? 'nav-link active' : 'nav-link' }}"
                                                   href="{{ route('app.lost.dogs') }}">Lost Pets</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->routeIs('app.found.dogs') ? 'nav-link active' : 'nav-link' }}"
                                                   href="{{ route('app.found.dogs') }}">Found Pets</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->routeIs('app.faq') ? 'nav-link active' : 'nav-link' }}"
                                                   href="{{ route('app.faq') }}">FAQ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->routeIs('app.contact') ? 'nav-link active' : 'nav-link' }}"
                                                   href="{{ route('app.contact') }}">Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="col-md-7 col-lg-2 col-12 d-none d-sm-block d-md-none d-lg-block">
                        <div class="top-menu">
                            <ul>

                                @auth
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-user font-size-16 align-middle me-1"></i>
                                            <span key="t-user-menu" style="font-size: 16px !important;">Profile</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu"
                                            aria-labelledby="userDropdown" style="min-width: 150px;">
                                            <li>
                                                <a class="dropdown-item custom-dropdown-item"
                                                    href="{{ route('user.dashboard') }}">
                                                    <i class="bx bx-home-alt font-size-16 align-middle me-1"></i>
                                                    <span key="t-dashboard">Dashboard</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item custom-dropdown-item text-danger"
                                                    style="padding-bottom: 10px;" href="{{ route('user.logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i
                                                        class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                                    <span key="t-logout">Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <form id="logout-form" style="display: none;" method="POST"
                                            action="{{ route('user.logout') }}">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <a href="/login" wire:navigate>Sign-in</a>
                                    </li>
                                    <li>
                                        <a href="/register" wire:navigate>Sign-up</a>
                                    </li>
                                @endauth
                            </ul>
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
            <div class="{{ request()->is('/') || request()->is('/*') ? 'item active' : 'item' }}"><a href="/"
                    wire:navigate>Chasetail</a></div>
            <div
                class="{{ request()->is('subscription') || request()->is('subscription/*') ? 'item active' : 'item' }}">
                <a href="/subscription" wire:navigate>Pricing</a>
            </div>
            <div
                class="{{ request()->is('how-it-works') || request()->is('how-it-works/*') ? 'item active' : 'item' }}">
                <a href="/how-it-works" wire:navigate>How
                    It Works?</a>
            </div>
            <div class="{{ request()->is('lostdogs') || request()->is('lostdogs/*') ? 'item active' : 'item' }}"><a
                    href="/lostdogs" wire:navigate>Lost
                    Pets</a></div>
            <div class="{{ request()->is('found-dogs') || request()->is('found-dogs/*') ? 'item active' : 'item' }}">
                <a href="/found-dogs" wire:navigate>Found
                    Pets</a>
            </div>
            <div class="{{ request()->is('faq') || request()->is('faq/*') ? 'item active' : 'item' }}"><a
                    href="/faq" wire:navigate>FAQ</a></div>
            <div class="{{ request()->is('contact-us') || request()->is('contact-us/*') ? 'item active' : 'item' }}">
                <a href="/contact-us" wire:navigate>Contact
                    Us</a>
            </div>
        </div>
    </div>
</div>
