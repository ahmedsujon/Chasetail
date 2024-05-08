<div>
    <!-- Banner -->
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Lost Dog Report</h4>
                        <p>You have a found dog. <a href="/found-dogs" wire:navigate>Click to Search</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section class="lost-detail-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="lost-detail-left">
                        <img class="img-fluid" src="{{ asset($found_dog->images) }}" alt="Lost Detail">
                        <p>Pet reported by Dallas Animal Services</p>
                        <button class="btn btn-primary btn-dog-parent mt-3" type="button">Contact Dog Parent</button>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="lost-detail-right">
                        <h4>Lost Pet Report</h4>
                        <ul>
                            <li>Pet Status<span>{{ $found_dog->missing_status }}</span></li>
                            <li>Found Date<span>{{ date('F j, Y', strtotime($found_dog->found_date)) }}</span></li>
                        </ul>
                        <h5>About This Pet</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Sex</td>
                                    <td>{{ $found_dog->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Microchip</td>
                                    @if ($found_dog->microchip_id)
                                        <td>{{ $found_dog->microchip_id }}</td>
                                    @else
                                        <td>Not Available</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Dog Name</td>
                                    @if ($found_dog->name)
                                        <td>{{ $found_dog->name }}</td>
                                    @else
                                        <td>Not Available</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Lost Near</td>
                                    <td>Dallas, TX 75211</td>
                                </tr>
                            </tbody>
                        </table>
                        <h6><a href="#">Report this listing</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
