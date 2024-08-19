<div>
    <section id="signup-section">
        <div class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="signInSignUpModal">
                            <div class="signup-form">
                                <form wire:submit.prevent='verifyOtp'>

                                    <div class="mb-3">
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger text-center">{{ session('error') }}</div>
                                        @endif
                                        @if (session()->has('success'))
                                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                                        @endif

                                        <label for="otp" class="form-label">Enter OTP</label>
                                        <input type="number" wire:model.blur='otp' class="form-control" id="otp">
                                        @error('otp')
                                            <p class="text-danger font-size-12">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-5 mb-3">{!! loadingStateWithText('userLogin', 'Create your account') !!}</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
