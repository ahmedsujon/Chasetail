<div>
    <!-- Side bar -->
    <div class="side-bar">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <div class="menu">
            <div class="item"><a href="index.html"><i class="fas fa-desktop"></i>Home</a></div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-table"></i>About<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-cogs"></i>Partners<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                </div>
            </div>
            <div class="item"><a href="#"><i class="fas fa-info-circle"></i>Pricing</a></div>
        </div>
    </div>

    <!-- Banner -->
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Showing all dogs near you</h4>
                        <p>Showing results within 10 miles</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section class="lost-dog-list-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="lost-dog-list-left">
                        <form>
                            <h4>Filters <span> <a href="#">Reset
                                        Filters</a></span></h4>
                            <h5>Location</h5>
                            <div class="location-left">
                                <p>City or zip</p>
                                <h5>Plano, TX 75025, USA</h5>
                            </div>
                            <div class="current-location">
                                <p><a href="#">Use current location</a></p>
                            </div>
                            <div class="search-radius">
                                <label for="formControlRange" class="form-label">Search Radius</label>
                                <input type="range" class="form-control-range" id="formControlRange"
                                    onInput="$('#rangeval').html($(this).val())">
                                <span id="rangeval">50<!-- Default value -->
                                </span> Miles
                            </div>
                            <div class="myselect">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Size</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>
                            <div class="myselect">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Age</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>
                            <div class="myselect">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Sex</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>
                            <div class="myselect">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Bread</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>
                            <div class="myselect">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Color</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>

                            <div class="top-donate text-center mt-4">
                                <a href="#">Apply Filters</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="lost-dog-list-right">
                        <div class="row">
                            @foreach ($lost_dogs as $lost_dog)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="lost-dog-list-right-text">
                                        <img class="img-fluid"
                                            src="{{ asset($lost_dog->images) }}" alt="Lost Dog">
                                        <h4><a href="#">Pomeranian
                                                Puppy</a></h4>
                                        <p>Dallas - Texas:
                                        <ul>
                                            <li>Adult
                                                female</li>
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $lost_dogs->links('livewire.pagination-links') }}
                </div>
            </div>
        </div>
    </section>
</div>
