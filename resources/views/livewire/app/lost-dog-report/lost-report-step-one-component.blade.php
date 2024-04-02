<div>
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Posting as Starter or Free User</h4>
                        <p>Update Plan? <a href="#">Roll-Back</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="step-content">
        <div class="container">
            <form class="form-step">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page">
                            <h3>Where did your dog get lost?</h3>
                            <p>You may provide the specific address. We will never share your exact location.</p>
                            <input class="form-control form-location" type="text" wire:model.blur="longitude"
                                placeholder="Lost near (address or zip)">
                            <h5> Use current location</h5>
                            <div class="location-map">
                                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="http://www.openstreetmap.org/export/embed.html?bbox=-102.72216796875%2C16.825574258731496%2C-73.71826171874999%2C34.397844946449865&amp;layer=mapnik"
                                    style="border: 1px solid black"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/lost-dog-report-seceond" wire:navigate class="btn btn-primary mt-3" type="button">Next</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
