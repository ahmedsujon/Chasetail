<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="content-box">
                    <h2>List of Found Dogs</h2>
                    @foreach ($found_dogs as $found_dog)
                        <div class="box-info">
                            <div class="row">
                                <div class="col-md-5 col-lg-5 col-5">
                                    <div class="box-info-img">
                                        <img class="img-fluid" src="{{ asset($found_dog->photos) }}" alt="found dog" style="height: 200px; margin-bottom: 50px;" />
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-7 col-7">
                                    <div class="box-info-text">
                                        <h3>{{ $found_dog->name }}</h3>
                                        <p>Found Address: {{ $found_dog->address }}</p>
                                        <p>Color: {{ $found_dog->color }}</p>
                                        <p>Gender: {{ $found_dog->gender }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer bg-transparent">
                    {{ $found_dogs->links('livewire.pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
