<div>
    <style>
        .nav-link.active {
            color: #007AE2 !important;
        }
    </style>
    <header>
        <div class="header-bot">
            <div class="container-fluid">
                <div class="row align-items-center">

                    <div class="col-md-6 col-lg-3 col-6">
                        <div class="logo">
                            <a href="/" wire:navigate><img class="img-fluid"
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
                                                <a class="{{ request()->is('/') || request()->is('/*') ? 'nav-link active' : '' }}"
                                                    href="/" wire:navigate>Chasetail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->is('about-us') || request()->is('about-us/*') ? 'nav-link active' : '' }}"
                                                    href="/about-us" wire:navigate>About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->is('lostdogs') || request()->is('lostdogs/*') ? 'nav-link active' : '' }}"
                                                    href="/lostdogs" wire:navigate>Lost Pets</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->is('found-dogs') || request()->is('found-dogs/*') ? 'nav-link active' : '' }}"
                                                    href="/found-dogs" wire:navigate>Found Pets</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->is('subscription') || request()->is('subscription/*') ? 'nav-link active' : '' }}"
                                                    href="/subscription" wire:navigate>Pricing</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->is('contact-us') || request()->is('contact-us/*') ? 'nav-link active' : '' }}"
                                                    href="/contact-us" wire:navigate>Contact Us</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->is('how-it-works') || request()->is('how-it-works/*') ? 'nav-link active' : '' }}"
                                                    href="/how-it-works" wire:navigate>How It Works?</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="{{ request()->is('faq') || request()->is('faq/*') ? 'nav-link active' : '' }}"
                                                    href="/faq" wire:navigate>FAQ</a>
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
