<div>
    <section id="signup-section">
        <div class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="signInSignUpModal">
                            <div class="signup-form">
                                <h3>Reset Your Password</h3>
                                <div>
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger text-center">{{ session('error') }}</div>
                                    @endif
                                    @if (session()->has('success'))
                                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                                    @endif
                                </div>
                                <form wire:submit.prevent='changePassword'>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Enter your email</label>
                                        <input type="email" wire:model.blur='email' class="form-control"
                                            id="email">
                                        @error('email')
                                            <p class="text-danger font-size-12">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Enter new password</label>
                                        <input type="password" wire:model.blur='password' class="form-control"
                                            id="email">
                                        @error('email')
                                            <p class="text-danger font-size-12">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Enter confirm password</label>
                                        <input type="password" wire:model.blur='confirm_password' class="form-control">
                                        @error('confirm_password')
                                            <p class="text-danger font-size-12">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{!! loadingStateWithText('changePassword', 'Reset Password') !!}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
