<div>
    <style>
        .card {
            border: none;
            width: 100%;
            border-radius: 5px;
            overflow: hidden;
            background: #fff8ef;
        }

        .inner-card {
            height: 20px;
            border-radius: 10px;
            background-color: #eee;
        }

        .card-1 {
            height: 158px;
            background-color: #eee;
            border-radius: 20px;
            border: 2px solid #eee;
        }

        .card-2 {
            height: 158px;
        }

        .h-screen {
            height: 100vh;
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(.4, 0, .6, 1) infinite;
        }

        @keyframes pulse {
            50% {
                opacity: .9;
            }
        }
    </style>

    @foreach ($found_dogs as $found_dog)
        {{-- <div class="found_dog_skeleton d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="row">
                    <div class="col-5">
                        <div class="card-1 animate-pulse">
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card-2 p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="inner-card animate-pulse">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-10">
                                    <div class="inner-card animate-pulse">

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="inner-card animate-pulse">

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <div class="inner-card animate-pulse">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
                <a href="#" class="btn-view">View All</a>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.found_dog_skeleton').addClass('d-none');
                $('.found_dog_loop_container').removeClass('d-none');
            }, 2000);
        });
    </script>
@endpush
