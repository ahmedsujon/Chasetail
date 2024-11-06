<div>
    <style>
        .location-area {
            padding-top: 5px;
            width: 100%;
            overflow: hidden;
            text-align: center;
            border-radius: 10px;
        }

        .location-area h5 {
            padding: 10px 0 5px 22px;
            margin-top: 25px;
            line-height: 24px;
            font-family: "nunito_sansregular";
            font-size: 18px;
            display: inline-block;
            text-decoration: underline;
            color: #0e1a25;
            background: url("https://chasetail.com/assets/app/images/icon-map.png") no-repeat left center;
        }
    </style>
    <div class="contaier">
        <section id="page-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="page-header-text">
                            <h4>Personal information</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Page Content -->
        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-2"></div>
                    <div class="col-md-8 col-lg-8 col-8">
                        <div class="contact-right">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            {{-- <h4>Get in touch</h4> --}}
                            <form class="form-contact" wire:submit.prevent='storeData'>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" wire:model="name" class="form-control" required>
                                            @error('name')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" wire:model="email" class="form-control" id="email"
                                                required>
                                            @error('email')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" wire:model="phone" class="form-control" required>
                                            @error('phone')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" wire:model="password" class="form-control">
                                            @error('password')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" wire:model="confirm_password" class="form-control"
                                                id="confirm_password">
                                            @error('confirm_password')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="location-area">
                                        <input class="form-control form-location" id="location_address"
                                            name="location_address" oninput="onTyping(this)" autocomplete="off"
                                            type="text" placeholder="Your address">
                                            <p class="pt-2">Address: {{ $address }}</p>
                                        <ul id="search-result"></ul>
                                        @error('longitude')
                                            <p class="text-danger" style="font-size: 16px;">{{ $message }}</p>
                                        @enderror
                                        <h5 onclick="getCurrentLocation();" style="cursor: pointer;"> Use current
                                            location</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12" wire:ignore>
                                                <div id="map"
                                                    style="width: 100%; height: 280px; margin-top: 25px; border: 1px solid; border-radius: 5px;">
                                                </div>
                                                <br>
                                                <input type="hidden" name="latitude" id="latitude">
                                                <input type="hidden" name="longitude" id="longitude">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="width100" style="text-align: right;">
                                    <button type="submit" class="btn btn-contact">
                                        {!! loadingStateWithText('storeData', 'Update') !!}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-2"></div>
                </div>
            </div>
        </section>
    </div>
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
            center: [32.779167, -96.808891],
            zoom: 15
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
            @this.set('address', display_name);

            // clear results
            clearResults()
        }
    </script>
@endpush
