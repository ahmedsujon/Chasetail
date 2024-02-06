<div>
    @foreach ($found_dogs as $found_dog)
        <div class="found_dog_loop_container box-info">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-5">
                    <div class="box-info-img">
                        <img class="img-fluid" src="{{ asset($found_dog->photos) }}" alt="found dog" />
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
    <div class="view-all">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="/found-dogs"  wire:navigate class="btn-view">View All</a>
            </div>
        </div>
    </div>
</div>
