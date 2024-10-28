<div>
    <style>
        .form-check {
            text-align: left;
            padding-top: 30px;
        }

        .form-check-input {}

        .form-check-label {
            padding: 0px 0px 0px 5px !important;
            padding:
        }

        .text-danger {
            text-align: left;
        }
    </style>
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Account Information</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="step-content mb-5">
        <div class="container">
            <form class="form-step" wire:submit.prevent='userRegistration'>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page">
                            <div class="row">
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-right">
                                        <div class="mb-4">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" wire:model.blur="name" class="form-control"
                                                placeholder="Enter your name">
                                            @error('name')
                                                <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3" wire:ignore>
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" wire:model.blur='phone' class="form-control phone"
                                                id="phone" placeholder="(123) 456-7890" required>
                                            @error('phone')
                                                <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        @error('phone')
                                                <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                            @enderror
                                        <div class="mb-4">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" wire:model.blur="confirm_password"
                                                class="form-control" placeholder="Enter confirm password">
                                            @error('confirm_password')
                                                <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-left">
                                        <div class="mb-4">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" wire:model.blur="email" class="form-control"
                                                placeholder="Enter your email">
                                            @error('email')
                                                <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" wire:model.blur="password" class="form-control"
                                                placeholder="Enter password">
                                            @error('password')
                                                <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-check" wire:ignore>
                                            <input class="form-check-input notify_status" value="1" type="checkbox"
                                                id="flexCheckDefault" onchange="updateCheckboxValue(this)" checked>
                                            <label style="font-size: 16px;" class="form-check-label" for="flexCheckDefault">
                                                I would like to receive notifications
                                            </label>
                                            @error('notify_status')
                                                <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        @if ($latitude == null || $longitude == null)
                                            <p style="color: red">Please allow location access in your browser settings!
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            @if ($latitude == null || $longitude == null)
                                <button disabled type="submit" class="btn btn-primary mt-3">Next</button>
                            @else
                                <button type="submit" class="btn btn-primary mt-3">Next</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@push('scripts')
    <!-- Include jQuery and jQuery Input Mask -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.17/jquery.inputmask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#phone').inputmask("(999) 999-9999");
        });

        $(".phone").on('change', function() {
            @this.set('phone', $(this).val());
        });
        $(".notify_status").on('change', function() {
            @this.set('notify_status', $(this).val());
        });
    </script>

    <script>
        $(document).ready(function() {
            navigator.geolocation.getCurrentPosition((position) => {
                const p = position.coords;

                @this.set('latitude', p.latitude);
                @this.set('longitude', p.longitude);

            }, function(error) {
                if (error.code === 1) {
                    alert('Permission denied. Please allow location access in your browser settings.');
                } else {
                    alert('Error getting location: ' + error.message);
                }
            });
        });
    </script>

    <script>
        function updateCheckboxValue(checkbox) {
            checkbox.value = checkbox.checked ? '1' : '0';
            Livewire.emit('input', checkbox.name, checkbox.value);
        }
    </script>
@endpush
