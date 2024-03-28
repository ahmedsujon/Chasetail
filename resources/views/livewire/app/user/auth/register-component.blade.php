<div>
    <section id="signup-section">
        <div class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="signInSignUpModal">
                            <div class="signup-form">
                                <h4>Sign Up</h4>
                                <h5>New customer? Please create your account first</h5>
                                <form wire:submit.prevent='userRegistration'>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">full name</label>
                                        <input type="text" wire:model.blur='name' class="form-control"
                                            id="name">
                                        @error('name')
                                            <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">email address</label>
                                        <input type="email" wire:model.blur='email' class="form-control"
                                            id="email">
                                        @error('email')
                                            <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" wire:model.blur='phone' class="form-control"
                                            id="phone">
                                        @error('phone')
                                            <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">password</label>
                                        <input type="password" wire:model.blur='password' class="form-control"
                                            id="password">
                                        @error('password')
                                            <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    @if ($latitude == null || $longitude == null)
                                        <p style="color: red">Lang is requred!</p>
                                    @endif

                                    @if ($latitude == null || $longitude == null)
                                    <button type="submit" disabled class="btn btn-primary">{!! loadingStateWithText('userRegistration', 'Create Your Account') !!}</button>
                                    @else
                                    <button type="submit" class="btn btn-primary">{!! loadingStateWithText('userRegistration', 'Create Your Account') !!}</button>
                                    @endif

                                    <p class="click">By clicking "<span>Create Your Account</span>", you agree to our
                                        <a href="/terms-conditions" wire:navigate>Terms & Conditions</a> and <a href="/privacy-policy" wire:navigate>Privacy
                                            Policy</a>.
                                    </p>
                                    <p>Have an account? <a href="/login" wire:navigate>Sign in</a></p>
                                </form>
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
@endpush
