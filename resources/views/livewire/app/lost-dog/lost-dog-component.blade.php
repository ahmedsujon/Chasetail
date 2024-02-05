<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="content-box">
                    <h2>List of Lost Dogs</h2>
                    @foreach ($lost_dogs as $lost_dog)
                        <div class="box-info">
                            <div class="row">
                                <div class="col-md-5 col-lg-5 col-5">
                                    <div class="box-info-img">
                                        <img class="img-fluid" src="{{ asset($lost_dog->photos) }}" alt="found dog" />
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-7 col-7">
                                    <div class="box-info-text">
                                        <h3>{{ $lost_dog->name }}</h3> 
                                        <p>Found Address: {{ $lost_dog->address }}</p>
                                        <p>Color: {{ $lost_dog->color }}</p>
                                        <p>Gender: {{ $lost_dog->gender }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer bg-transparent">
                    {{ $lost_dogs->links('livewire.pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
