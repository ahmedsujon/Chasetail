<div>
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
                                <a href="#" wire:click.prevent="subscriptionEvent(0)">Choose Starter Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul class="free-package">
                                <li>Can add single photo</li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
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
                                <a href="/login" wire:navigate>Choose Starter Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul class="free-package">
                                <li>Can add single photo</li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
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
                            <h5>Basic</h5>
                            <h4>$99<span class="user">/ 500 User</span></h4>
                            <p>Basic User</p>
                            <div class="btn-plan">
                                <a href="#" wire:click.prevent="subscriptionEvent(99)">Choose Basic Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>500 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get notification from rescue team</li>
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
                            <h4>$99<span class="user">/ 500 User</span></h4>
                            <p>Basic User</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Choose Basic Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>500 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get notification from rescue team</li>
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
                            <h5>Gold</h5>
                            <h4>$149<span class="user">/ 750 User</span></h4>
                            <p>Gold User</p>
                            <div class="btn-plan">
                                <a href="#" wire:click.prevent="subscriptionEvent(149)">Choose Gold Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>750 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get notification from rescue team</li>
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
                            <h5>Gold</h5>
                            <h4>$149<span class="user">/ 750 User</span></h4>
                            <p>Gold User</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Choose Gold Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>750 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get notification from rescue team</li>
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
                            <h5>Premium</h5>
                            <h4>$169<span class="user">/ 1000 User</span></h4>
                            <p>Premium User</p>
                            <div class="btn-plan">
                                <a href="#" wire:click.prevent="subscriptionEvent(149)">Choose Premium Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>1000 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get notification from rescue team</li>
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
                            <h5>Premium</h5>
                            <h4>$169<span class="user">/ 1000 User</span></h4>
                            <p>Premium User</p>
                            <div class="btn-plan">
                                <a href="/login" wire:navigate>Choose Premium Plan</a>
                            </div>
                            <h6>Includes</h6>
                            <ul>
                                <li>1000 User Nearby</li>
                                <li>Can add single photo</li>
                                <li>Add multiple photo <span style="font-weight: 600">($29 extra)</span></li>
                                <li>Can add short description</li>
                                <li>Add food & medicine info.</li>
                                <li>Share with selected areas neighbor</li>
                                <li>Send SMS & Email</li>
                                <li>Get notification from rescue team</li>
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
