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

        < !-- CSS for the badge -->.ribbon {
            width: 150px;
            height: 150px;
            overflow: hidden;
            position: absolute;
            top: -10px;
            right: -10px;
        }

        .package-list {
            position: relative;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
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
                <div class="col-md-6 col-lg-3 col-12">
                    <div class="package-list">
                        <h5>Starter</h5>
                        <h4>FREE</h4>
                        <p>Post on website only</p>
                        <div class="btn-plan">
                            <a href="{{ route('free.plan.report') }}">Starter Plan</a>
                        </div>
                        <h6>Includes</h6>
                        <ul class="free-package">
                            <li>Can add single photo</li>
                            <li>Can add short description</li>
                            <li>Add food & medicine info</li>
                            <li>Add short description (150 character)</li>
                            <li><strong>Does not include neighbor contact</strong></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-12">
                    <div class="package-list">
                        <h5>Basic Plan</h5>
                        <h4>$99<span class="user">/ 250 Direct Contacts</span></h4>
                        <p>Send 250 Flyers</p>
                        <div class="btn-plan">
                            <a href="{{ route('text.plan.report') }}">Basic Plan</a>
                        </div>
                        <h6>Includes</h6>
                        <ul>
                            <li>250 Nearby Contacts</li>
                            <li>Add short description (150 character)</li>
                            <li>Add food & medicine info.</li>
                            <li>Share with selected area's neighbors</li>
                            <li>Get real time notification of sightings or rescue</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-12">
                    <div class="package-list position-relative"
                        style="border: 1px solid #e0e0e0; padding: 20px; border-radius: 8px;">
                        <!-- Popular Badge -->
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                        <h5>Level One</h5>
                        <h4>$139<span class="user">/ 250 Contact Neighbors</span></h4>
                        <p>Send 250 Flyers and Add a Picture</p>
                        <div class="btn-plan">
                            <a href="{{ route('plan.one.report') }}">Level One Plan</a>
                        </div>
                        <h6>Includes</h6>
                        <ul>
                            <li>250 Nearby Contacts</li>
                            <li>Can add single photo</li>
                            <li>Can add 200 character description</li>
                            <li>Add food & medicine info.</li>
                            <li>Share with selected area's neighbors</li>
                            <li>Send Email with picture</li>
                            <li>Get real time notification of sightings or rescue</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-12">
                    <div class="package-list">
                        <h5>Level Two</h5>
                        <h4>$169<span class="user">/ Contact 500 Neighbors</span></h4>
                        <p>Send 500 Flyers and Add a Picture</p>
                        <div class="btn-plan">
                            <a href="{{ route('plan.two.report') }}">Level Two Plan</a>
                        </div>
                        <h6>Includes</h6>
                        <ul>
                            <li>500 Nearby Contacts</li>
                            <li>Can add single photo</li>
                            <li>Can add 200 character description</li>
                            <li>Add food & medicine info.</li>
                            <li>Send Email with picture</li>
                            <li>Share with selected area's neighbors</li>
                            <li>Get real time notification of sightings or rescue</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-12">
                    <div class="package-list">
                        <!-- Most Popular Badge -->
                        <div class="ribbon">
                            <span>Most Popular</span>
                        </div>
                        <h5>Level Three</h5>
                        <h4>$199<span class="user">/ Contact 750 Neighbors</span></h4>
                        <p>Send 750 Flyers and Add a Picture</p>
                        <div class="btn-plan">
                            <a href="{{ route('plan.three.report') }}">Level Three Plan</a>
                        </div>
                        <h6>Includes</h6>
                        <ul>
                            <li>750 Nearby Contacts</li>
                            <li>Can add single photo</li>
                            <li>Can add 200 character description</li>
                            <li>Add food & medicine info.</li>
                            <li>Send Email with picture</li>
                            <li>Share with selected area's neighbors</li>
                            <li>Get real time notification of sightings or rescue</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-12">
                    <div class="package-list">
                        <h5>Level Four</h5>
                        <h4>$239<span class="user">/ Contact 1000 Neighbors</span></h4>
                        <p>Send 1000 Flyers and Add a Picture</p>
                        <div class="btn-plan">
                            <a href="{{ route('plan.four.report') }}">Level Four Plan</a>
                        </div>
                        <h6>Includes</h6>
                        <ul>
                            <li>1000 Nearby Contacts</li>
                            <li>Can add single photo</li>
                            <li>Can add 200 character description</li>
                            <li>Add food & medicine info.</li>
                            <li>Send Email with picture</li>
                            <li>Share with selected area's neighbors</li>
                            <li>Get real time notification of sightings or rescue</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
