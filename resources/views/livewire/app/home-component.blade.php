<div>
    <section id="banner">
        <div class="banner">
            <div class="banner-text">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 col-9">
                            <h3>Do You Want To find
                                your lost dog? </h3>
                            <a href="#">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="content-box">
                    <h2>List of Found Dogs</h2>
                    <livewire:app.components.found-dog-component lazy />
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="content-box">
                    <h2>List of Lost Dogs</h2>
                    <livewire:app.components.lost-dog-component lazy />
                </div>
            </div>
        </div>
    </div>
</div>
