<div>
    <style>
        .print-flyer h5 {
            padding: 13px 0 13px 0;
            line-height: 24px;
            font-family: 'nunito_sansbold';
            font-size: 16px;
            text-align: center;
            text-transform: uppercase;
            border-top: 1px solid #e7e7e7;
            border-bottom: 1px solid #e7e7e7;
            background: url("{{ asset('assets/app/images/print.png') }}") no-repeat 37% 16px;
        }

        .print-flyer h5 a {
            text-decoration: none;
            padding-right: 65px;
        }
    </style>
    <!-- Banner -->
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Lost Dog Report Details</h4>
                        <p>You have a found dog. <a href="/lostdogs" wire:navigate>Click to Search</a></p>
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
                        @if ($lost_dog->images)
                            <img class="img-fluid" src="{{ asset($lost_dog->images) }}" alt="Lost Detail">
                        @else
                            <img class="img-fluid" src="{{ asset('assets/app/images/placeholder.jpg') }}"
                                alt="Lost Detail">
                        @endif
                        {{-- <img class="img-fluid" src="{{ asset($lost_dog->images) }}" alt="Lost Detail"> --}}
                        <p>Pet reported by Dallas Animal Services</p>
                        <button class="btn btn-primary btn-dog-parent mt-3" type="button">Contact Dog Parent</button>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="lost-detail-right">
                        <h4>Lost Pet Report</h4>
                        <ul>
                            <li>Pet Status<span>FOUND</span></li>
                            <li>Lost Date<span>{{ $lost_dog->last_seen }}</span></li>
                        </ul>
                        <h5>About This Pet</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Sex</td>
                                    <td>{{ $lost_dog->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Microchip</td>
                                    @if ($lost_dog->microchip_id)
                                        <td>{{ $lost_dog->microchip_id }}</td>
                                    @else
                                        <td>Not Available</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Dog Name</td>
                                    @if ($lost_dog->name)
                                        <td>{{ $lost_dog->name }}</td>
                                    @else
                                        <td>Unknown</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Lost Near</td>
                                    <td>{{ $lost_dog->address }}</td>
                                </tr>
                                <tr>
                                    <td>Food & medicine info</td>
                                    <td>{{ $lost_dog->medicine_info }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $lost_dog->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="print-flyer">
                            <h6><a href="#">Report this listing</a></h6>
                            <h5 class="print-flyer"><a
                                    href="{{ route('app.lost.dogs.flyer', ['id' => $lost_dog->id]) }}">Print Flyer</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
