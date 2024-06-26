<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="dashboard-search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <p>You have a lost pet. <a href="#">Click to
                            Search</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <section class="step-content">
        <div class="container-fluid">
            <div class="dashboard-page">
                <div class="row">
                    <div class="col-md-12 col-lg-7 col-12">
                        <h4>Dashboard</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-7 col-12">
                        <div class="dashboard-page-left">
                            <h5>Lost Dogs</h5>
                            <a class="btn btn-primary add-dog" href="#">Add
                                a dog</a>
                            <div id="lost" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <img src="{{ asset('assets/app/images/dashboard-dog1.jpg') }}"
                                                    alt="Los Angeles" class="img-fluid">
                                            </div>
                                            <div class="col-lg-8 col-md-6 col-12">
                                                <div class="carousel-caption">
                                                    <h3>Buddy</h3>
                                                    <p>Lost pet</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <img src="{{ asset('assets/app/images/dashboard-dog2.jpg') }}"
                                                    alt="Los Angeles" class="img-fluid">
                                            </div>
                                            <div class="col-lg-8 col-md-6 col-12">
                                                <div class="carousel-caption">
                                                    <h3>Fido</h3>
                                                    <p>Lost pet</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Left and right controls/icons -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#lost"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#lost"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>

                            <h5>Found Dogs</h5>
                            <div id="found" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('assets/app/images/dashboard-dog2.jpg') }}"
                                                    alt="Los Angeles" class="img-fluid">
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="carousel-caption">
                                                    <h3>Fido</h3>
                                                    <p>Lost pet</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('assets/app/images/dashboard-dog1.jpg') }}"
                                                    alt="Los Angeles" class="img-fluid">
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="carousel-caption">
                                                    <h3>Buddy</h3>
                                                    <p>Lost pet</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Left and right controls/icons -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#found"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#found"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 col-12">
                        <div class="dashboard-page-right">
                            <h5>Inbox</h5>
                            <ul>
                                <li class="message"><a href="#">Messages</a></li>
                            </ul>
                            <h5>Account Settings</h5>
                            <ul>
                                <li class="personal"><a href="#">Personal
                                        information</a></li>
                                <li class="delete"><a href="#">Delete
                                        account</a></li>
                                <li class="payment"><a href="#">Payment
                                        History</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
