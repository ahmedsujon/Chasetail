<div>
    <section id="banner-section">
        <div class="banner">
            <div class="banner-text">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-6">
                            <h3>Do You Want To find
                                your lost dog? </h3>
                            <p>Find your new best friend. We’re here to help your lost pet find their way home. Browse
                                pets from our network of your nearby shelters and rescues.</p>
                            @auth
                                @if ($subscription == 1)
                                    <a href="/lost-dog-report-first" wire:navigate>Get Started</a>
                                @else
                                    <a href="/subscription" wire:navigate>Get Started</a>
                                @endif
                            @else
                                <a href="/login" wire:navigate>Get Started</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="welcome">
                    <h4>Our solutions</h4>
                    <ul class="solution-hr">
                        <li></li>
                    </ul>
                    <h3>Unleashing the power of advanced technology to Find Fido Fast!!</h3>
                    <p>Time matters when you’ve lost your pet. We actively engage with the majority of households and
                        people in the area around the last known place of your precious pet. This is not a passive
                        posting on
                        other websites. We engage in a one on one basis to those in range of your beloved/lost animal.
                    </p>
                </div>
            </div>
        </div>
        <div class="content-top">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="article-box">
                        <img class="img-fluid" src="{{ asset('assets/app/images/content-dog01.jpg') }}"
                            alt="Content Dog">
                        <h4><a href="/lost-dogs" wire:navigate>Lost Dogs</a></h4>
                        <p>We’re here to help you find your dog. Free and easy way to search lost dogs to help them
                            return home.</p>
                        <ul class="content-hr">
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="article-box">
                        <img class="img-fluid" src="{{ asset('assets/app/images/content-dog02.jpg') }}"
                            alt="Content Dog">
                        <h4><a href="/found-dogs" wire:navigate>Found Dogs</a></h4>
                        <p>Help reunite found dogs, by snapping a photo and uploading it or register your dog in case
                            they ever go missing. It’s free!</p>
                        <ul class="content-hr">
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="article-box">
                        <img class="img-fluid" src="{{ asset('assets/app/images/content-dog03.jpg') }}"
                            alt="Content Dog">
                        <h4><a href="/donation" wire:navigate>Donation</a></h4>
                        <p>A little Love goes a long way. We can’t do this without you. Every dollar counts, just like
                            every dog helps make the world a better place.</p>
                        <ul class="content-hr">
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="challenge">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>The challenge</h4>
                    <ul class="solution-hr">
                        <li></li>
                    </ul>
                    <h3>Time matters when you lose your pet. Don’t waste the most critical first few hours!! Making
                        posters is
                        time consuming and hoping you pick the correct corners to post them is a gamble.</h3>
                    <div class="challenge-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="challenge-box">
                                    <img class="img-fluid" src="{{ asset('assets/app/images/icon-loving-home.png') }}"
                                        alt="Millions of dogs">
                                    <h5>Millions of dogs</h5>
                                    <p>never find a loving home.</p>
                                    <p>There are 63.4 million Households in the US</p>
                                    <p>There are 89.7 million dogs in the US as Household Pets</p>
                                    <p>The average is 1.46 Dogs in Households with dogs.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="challenge-box">
                                    <img class="img-fluid" src="{{ asset('assets/app/images/icon-missing-dog.png') }}"
                                        alt="In every 1 in 10">
                                    <h5>In every 1 in 10</h5>
                                    <p>15 percent of the total pet owners experienc a pet loss</p>
                                    <p>Only 16% of lost pets eventually return on their own to their owners.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="challenge-box">
                                    <img class="img-fluid" src="{{ asset('assets/app/images/icon-resource.png') }}"
                                        alt="Loving Home">
                                    <h5>Countless</h5>
                                    <p>Shelters around the country euthanize millions of dogs and cats every year.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
