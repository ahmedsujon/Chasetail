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
                                        <div class="text-center">A one-time password (OTP) has been sent to your phone
                                            number. Please enter the OTP below to complete the verification process.
                                        </div>

                                        <label for="otp" class="form-label">Enter OTP</label>
                                        <input type="number" wire:model.blur='otp' class="form-control" id="otp">
                                        @error('otp')
                                            <p class="text-danger font-size-12">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary mt-5 mb-3">{!! loadingStateWithText('userLogin', 'Create your account') !!}</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
