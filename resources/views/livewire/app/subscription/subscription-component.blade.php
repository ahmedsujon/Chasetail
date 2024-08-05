<div>
    <style>
        .how-work {
            margin-top: 40px;
            border: 1px solid;
            padding: 45px;
            border-radius: 5px;
        }

        .how-work p {
            font-size: 18px;
            line-height: 28px;
        }
    </style>
    <!-- Banner -->
    <section id="page-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-banner-text">
                        <h4>Post a Missing Report</h4>
                        <p>Expand Your Search Radius: Choose Your
                            Package</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="how-work">
                <h3 style="padding-bottom: 10px;">How It Works</h3>
                <p>At Chase Tail we have the technology to contact the majority of the nearest cell phones registered in
                    your
                    area. You fill out your lost pet’s description and information and upload a picture. You choose the
                    size of the search that fits your needs and Chase Tail will actively contact the majority of
                    phones in the area immediately surrounding where your pet disappeared. The majority of found pets
                    that don’t return on their own are found in the first day after we start the search.</p>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <section class="page-content">
        <div class="container-fluid">
            <div class="row">
                @auth
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Starter</h5>
                            <h4>FREE</h4>
                            <p>Free User</p>
                            <div class="btn-plan">
                                <a href="/free-plan-report" wire:navigate>Starter Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul class="free-package">
                                <li>Can add single photo</li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info</li>
                                <li>Add short description (150 character)</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Starter</h5>
                            <h4>FREE</h4>
                            <p>Free User</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Starter Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul class="free-package">
                                <li>Can add single photo</li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
                                <li>Add short description (150 character)</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @auth
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Text Plan</h5>
                            <h4>$99<span class="user">/ 250 User</span></h4>
                            <p>Basic Text Plan</p>
                            <div class="btn-plan">
                                <a href="#" wire:click.prevent="subscriptionEvent(99, 'PlanA')">Basic Text Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>250 User Nearby</li>
                                <li>Add short description (100 character)</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Basic</h5>
                            <h4>$99<span class="user">/ 250 User</span></h4>
                            <p>Basic Text Plan</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Basic Text Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>250 User Nearby</li>
                                <li>Add short description (100 character)</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @auth
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Level One</h5>
                            <h4>$139<span class="user">/ 250 User</span></h4>
                            <p>Level One Plan</p>
                            <div class="btn-plan">
                                <a href="#" wire:click.prevent="subscriptionEvent(139, 'PlanB')">Level One Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>250 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add 275 character description</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send MMS with picture</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Level One</h5>
                            <h4>$139<span class="user">/ 250 User</span></h4>
                            <p>Level One Plan</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Level One Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>250 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add 275 character description</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send MMS with picture</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @auth
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Level Two</h5>
                            <h4>$169<span class="user">/ 500 User</span></h4>
                            <p>Level Two Plan</p>
                            <div class="btn-plan">
                                <a href="#" wire:click.prevent="subscriptionEvent(169, 'PlanC')">Level Two Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>500 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add 275 character description</li>
                                <li>Add food & medicine info.</li>
                                <li>Send MMS with picture</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Level Two</h5>
                            <h4>$169<span class="user">/ 500 User</span></h4>
                            <p>Level Two Plan</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Level Two Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>500 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add 275 character description</li>
                                <li>Add food & medicine info.</li>
                                <li>Send MMS with picture</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @auth
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Level Three</h5>
                            <h4>$199<span class="user">/ 750 User</span></h4>
                            <p>Level Three Plan</p>
                            <div class="btn-plan">
                                <a href="#" wire:click.prevent="subscriptionEvent(199, 'PlanD')">Level Three Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>750 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add 275 character description</li>
                                <li>Add food & medicine info.</li>
                                <li>Send MMS with picture</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Level Three</h5>
                            <h4>$199<span class="user">/ 750 User</span></h4>
                            <p>Level Three Plan</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Level Three Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>750 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add 275 character description</li>
                                <li>Add food & medicine info.</li>
                                <li>Send MMS with picture</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @auth
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Level Four</h5>
                            <h4>$239<span class="user">/ 1000 User</span></h4>
                            <p>Level Four Plan</p>
                            <div class="btn-plan">
                                <a href="#" wire:click.prevent="subscriptionEvent(239, 'PlanE')">Level Four Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>1000 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add 275 character description</li>
                                <li>Add food & medicine info.</li>
                                <li>Send MMS with picture</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="package-list">
                            <h5>Level Four</h5>
                            <h4>$239<span class="user">/ 1000 User</span></h4>
                            <p>Level Four Plan</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Level Four Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>1000 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add 275 character description</li>
                                <li>Add food & medicine info.</li>
                                <li>Send MMS with picture</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get real time notification of sightings or rescue</li>
                            </ul>
                            <h6>Support:</h6>
                            <ul>
                                <li>Email Only</li>
                            </ul>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </section>
</div>
