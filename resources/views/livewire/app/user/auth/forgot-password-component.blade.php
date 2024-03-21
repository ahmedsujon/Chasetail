<div>
    <section id="signup-section">
        <div class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="signInSignUpModal">
                            <div class="signup-form">
                                <h5>Please enter your username or email address. You will receive an email message with
                                    instructions on how to reset your password.</h5>
                                <div class="mt-2">
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger text-center">{{ session('error') }}</div>
                                    @endif
                                    @if (session()->has('success'))
                                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                                    @endif
                                </div>
                                <form wire:submit.prevent='sendEmail'>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Enter your email</label>
                                        <input type="email" wire:model.blur='email' class="form-control"
                                            id="email">
                                        @error('email')
                                            <p class="text-danger font-size-12">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{!! loadingStateWithText('sendEmail', 'Get New Password') !!}</button>
                                    <p>Have an account? <a href="/login" wire:navigate>Sign In</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
