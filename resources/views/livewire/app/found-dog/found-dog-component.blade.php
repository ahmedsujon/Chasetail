<div>
    @push('styles')
        <link href="{{ asset('assets/app/css/select2.min.css') }}" rel="stylesheet" />
    @endpush
    <!-- Banner -->
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12 d-flex align-items-center justify-content-between">
                    <div class="page-header-text" style="text-align: center;">
                        <h4>Gallery of Found Pets</h4>
                        <a href="{{ route('user.found.dog.report.first.step') }}" class="btn btn-primary">Report Found
                            Pet</a>
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
                            <h5>Location</h5>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="location_address" name="location_address"
                                    autocomplete="off" placeholder="Found near (address or zip)"
                                    wire:model.live="searchByAddressTerm" wire:keyup='resetPage'>
                                <label for="floatingInputValue">City or Zip</label>
                            </div>
                            <div class="found-dog-info">
                                <p><a>If you lose a lost pet, use this page to see if the someone found
                                        and registered your animal with ChaseTail.com. It is helpful to compare the
                                        picture.
                                        Type in the city or zip code where you lost the animal to look at lost pets
                                        close to that
                                        area. You can expand the area by putting in broader search area</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="lost-dog-list-right">
                        <div class="row">
                            @if ($found_dogs->count() > 0)
                                @php
                                    $sl =
                                        $found_dogs->perPage() * $found_dogs->currentPage() -
                                        ($found_dogs->perPage() - 1);
                                @endphp
                                @foreach ($found_dogs as $found_dog)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="lost-dog-list-right-text">
                                            @if ($found_dog->images)
                                                <img class="img-fluid" src="{{ asset($found_dog->images) }}"
                                                    alt="found-dog">
                                            @else
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/app/images/placeholder.jpg') }}"
                                                    alt="Lost Dog">
                                            @endif
                                            <h4><a
                                                    href="{{ route('app.found.dogs.details', ['id' => $found_dog->id]) }}">{{ $found_dog->name }}</a>
                                            </h4>
                                            <p>{{ $found_dog->address }}
                                            <ul>
                                                <li>{{ $found_dog->gender }}</li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="lost-dog-list-right-text text-center">
                                        <p>No pets found!</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="dog-pagination">
                                    {{ $found_dogs->links('livewire.pagination-links') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        function getCurrentLocation() {
            navigator.geolocation.getCurrentPosition((position) => {
                const p = position.coords;

                $('#latitude').val(p.latitude);
                $('#longitude').val(p.longitude);

                @this.set('latitude', p.latitude);
                @this.set('longitude', p.longitude);

                reverseGeocode(p.latitude, p.longitude);
                setLocation(p.latitude, p.longitude, '');

            }, function(error) {
                if (error.code === 1) {
                    alert('Permission denied. Please allow location access in your browser settings.');
                } else {
                    alert('Error getting location: ' + error.message);
                }
            });
        }

        function reverseGeocode(latitude, longitude) {
            const apiUrl =
                `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&zoom=18&addressdetails=1`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // console.log(data.address);
                    if (data.display_name) {
                        // console.log(data.address);

                        // var road = data.address.road != undefined ? data.address.road + ', ' : '';
                        // var county = data.address.county != undefined ? data.address.county + ', ' : '';
                        // var postcode = data.address.postcode != undefined ? data.address.postcode + ', ' : '';
                        // var state = data.address.state != undefined ? data.address.state : '';

                        const fullAddress = data.display_name;
                        // const fullAddress = road + county + postcode + state;
                        $('#location_address').val(fullAddress);
                        // $('#location_address').html(fullAddress);
                        @this.set('address', fullAddress);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        const resultsWrapperHTML = document.getElementById("search-result");
        let mapOptions = {
            center: [23.9456166, 90.2526382],
            zoom: 10
        }

        let map = new L.map('map', mapOptions);

        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);


        let marker = null;
        map.on('click', (event) => {

            if (marker !== null) {
                map.removeLayer(marker);
            }

            marker = L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);

            document.getElementById('latitude').value = event.latlng.lat;
            document.getElementById('longitude').value = event.latlng.lng;

            @this.set('latitude', event.latlng.lat);
            @this.set('longitude', event.latlng.lng);
            reverseGeocode(event.latlng.lat, event.latlng.lng);
        });


        // search location handler
        let typingInterval

        // typing handler
        function onTyping(e) {
            clearInterval(typingInterval)
            const {
                value
            } = e

            typingInterval = setInterval(() => {
                clearInterval(typingInterval)
                searchLocation(value)
            }, 100)
        }

        // search handler
        function searchLocation(keyword) {
            if (keyword) {
                fetch(`https://nominatim.openstreetmap.org/search?q=${keyword}&format=json`)
                    .then((response) => {
                        return response.json()
                    }).then(json => {
                        if (json.length > 0) return renderResults(json)
                    })
            }
        }

        // render results
        function renderResults(result) {
            let resultsHTML = ""

            result.map((n) => {
                resultsHTML +=
                    `<li><a href="javascript:void(0)" onclick="setLocation(${n.lat},${n.lon},'${n.display_name}')">${n.display_name}</a></li>`
            })

            resultsWrapperHTML.innerHTML = resultsHTML
        }

        // clear results
        function clearResults() {
            resultsWrapperHTML.innerHTML = ""
        }

        // set location from search result
        function setLocation(lat, lon, display_name) {
            // set map focus
            map.setView(new L.LatLng(lat, lon), 10)

            // regenerate marker position
            if (marker !== null) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lon]).addTo(map);

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            $('#location_address').val(display_name);

            @this.set('latitude', lat);
            @this.set('longitude', lon);
            @this.set('searchByAddressTerm', display_name);

            // clear results
            clearResults()
        }
    </script>
@endpush
