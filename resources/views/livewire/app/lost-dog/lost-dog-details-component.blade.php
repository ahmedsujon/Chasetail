<div>
    <style>
        .print-flyer h5 {
            padding: 13px 0 13px 0;
            line-height: 24px;
            font-family: 'nunito_sansbold';
            font-size: 16px;
            text-align: center;
            text-transform: uppercase;
            border-top: 1px solid #e7e7e7;
            border-bottom: 1px solid #e7e7e7;
            background: url("{{ asset('assets/app/images/print.png') }}") no-repeat 37% 16px;
        }

        .print-flyer h5 a {
            text-decoration: none;
            padding-right: 65px;
        }
    </style>
    <!-- Banner -->
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Lost Dog Report Details</h4>
                        <p>You have a found dog. <a href="/lostdogs" wire:navigate>Click to Search</a></p>
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
                        @if ($lost_dog->images)
                            <img class="img-fluid" src="{{ asset($lost_dog->images) }}" alt="Lost Detail">
                        @else
                            <img class="img-fluid" src="{{ asset('assets/app/images/placeholder.jpg') }}"
                                alt="Lost Detail">
                        @endif
                        {{-- <img class="img-fluid" src="{{ asset($lost_dog->images) }}" alt="Lost Detail"> --}}
                        <p>Pet reported by Dallas Animal Services</p>
                        @auth
                            @php
                                $ownerEmail = optional(getUserByID($lost_dog->user_id))->email;
                            @endphp

                            <a href="{{ route('app.claim.lost.pet') }}?email={{ $ownerEmail }}"
                                class="btn btn-primary btn-dog-parent mt-3" type="button">I Found It!</a>

                        @endauth
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary btn-dog-parent mt-3" type="button">I
                                Found It!</a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="lost-detail-right">
                        <h4>Lost Pet Report</h4>
                        <ul>
                            <li>Pet Status<span>FOUND</span></li>
                            <li>Lost Date<span>{{ $lost_dog->last_seen }}</span></li>
                        </ul>
                        <h5>About This Pet</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Sex</td>
                                    <td>{{ $lost_dog->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Microchip</td>
                                    @if ($lost_dog->microchip_id)
                                        <td>{{ $lost_dog->microchip_id }}</td>
                                    @else
                                        <td>Not Available</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Dog Name</td>
                                    @if ($lost_dog->name)
                                        <td>{{ $lost_dog->name }}</td>
                                    @else
                                        <td>Unknown</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Lost Near</td>
                                    <td>{{ $lost_dog->address }}</td>
                                </tr>
                                <tr>
                                    <td>Food & medicine info</td>
                                    <td>{{ $lost_dog->medicine_info }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $lost_dog->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="print-flyer">
                            @auth
                                <h6><a style="padding-left: 25px;" id="reportButton" wire:click="{{ $lost_dog->id }}"
                                        data-toggle="modal" data-target="#exampleModalCenter">Report this listing</a></h6>
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            @endauth
                            <h5 class="print-flyer"><a
                                    href="{{ route('app.lost.dogs.flyer', ['id' => $lost_dog->id]) }}">Print Flyer</a>
                            </h5>
                        </div>
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
                        <input type="hidden" wire:model="lost_dog_id" value="{{ $lost_dog->id }}">

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
