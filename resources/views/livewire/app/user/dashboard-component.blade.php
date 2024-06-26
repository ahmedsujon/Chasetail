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
                    <p>You have a lost pet. <a href="/lost-dogs" wire:navigate>Click to Search</a></p>
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
                            <a class="btn btn-primary add-dog" href="/subscription" wire:navigate>Add a dog</a>
                            <div id="lost" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($lost_dogs as $index => $lost_dog)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="row">
                                                <a href="{{ route('app.lost.dogs.details', ['id' => $lost_dog->id]) }}">
                                                    <div class="col-lg-4 col-md-6 col-12">
                                                        <img style="height: 116px; width: 116px;"
                                                            src="{{ asset($lost_dog->images) }}"
                                                            alt="{{ $lost_dog->name }}" class="img-fluid">
                                                    </div>
                                                    <div class="col-lg-8 col-md-6 col-12">
                                                        <div class="carousel-caption">
                                                            <h3>{{ $lost_dog->name }}</h3>
                                                            <p>{{ $lost_dog->address }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
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
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-5 col-12">
                        <div class="dashboard-page-right">
                            <h5>Inbox</h5>
                            <ul>
                                <li class="message"><a href="/messages" wire:navigate>Messages</a></li>
                            </ul>
                            <h5>Account Settings</h5>
                            <ul>
                                <li class="personal"><a href="/personal-information" wire:navigate>Personal
                                        information</a></li>
                                <li class="payment"><a href="/payment-history" wire:navigate>Payment
                                        History</a></li>
                                <li class="delete"><a href="#">Delete
                                        account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
