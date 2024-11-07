<div>
    <!-- Banner -->
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Lost Dog Report</h4>
                        <p>You have a found pet. <a href="/found-dogs" wire:navigate>Click to Search</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section class="lost-detail-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="lost-detail-left">
                        <img class="img-fluid" src="{{ asset($found_dog->images) }}" alt="Lost Detail">
                        <p>Pet reported by Dallas Animal Services</p>
                        @auth
                            @php
                                $ownerEmail = optional(getUserByID($found_dog->user_id))->email;
                            @endphp

                            <a href="{{ route('app.claim.found.pet') }}?email={{ $ownerEmail }}"
                                class="btn btn-primary btn-dog-parent mt-3">Yes! It’s mine!</a>
                        @endauth
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary btn-dog-parent mt-3">Yes!
                                It’s mine!</a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="lost-detail-right">
                        <h4>Lost Pet Report</h4>
                        <ul>
                            <li>Pet Status<span>{{ $found_dog->missing_status }}</span></li>
                            <li>Found Date<span>{{ date('F j, Y', strtotime($found_dog->found_date)) }}</span></li>
                        </ul>
                        <h5>About This Pet</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Sex</td>
                                    <td>{{ $found_dog->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Microchip</td>
                                    @if ($found_dog->microchip_id)
                                        <td>{{ $found_dog->microchip_id }}</td>
                                    @else
                                        <td>Not Available</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Dog Name</td>
                                    @if ($found_dog->name)
                                        <td>{{ $found_dog->name }}</td>
                                    @else
                                        <td>Not Available</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Lost Near</td>
                                    <td>{{ $found_dog->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h6><a style="padding-left: 25px;" id="reportButton" wire:click="{{ $found_dog->id }}"
                                data-toggle="modal" data-target="#exampleModalCenter">Report this listing</a></h6>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div wire:ignore.self class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Report this Listing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeData">
                        <!-- Pass the found dog ID to the Livewire property -->
                        <input type="hidden" wire:model="found_dog_id" value="{{ $found_dog->id }}">

                        <div class="form-group">
                            <label for="reportReason">Reason</label>
                            <select class="form-control" wire:model="reason" id="reportReason">
                                <option value="">Select reason</option>
                                <option value="spam">Spam</option>
                                <option value="inappropriate">Inappropriate Content</option>
                                <option value="duplicate">Duplicate Listing</option>
                            </select>
                            @error('reason')
                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {!! loadingStateWithText('storeData', 'Submit Report') !!}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            $('#exampleModalCenter').modal('hide');
        });
    </script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endpush
