<div>
    <section id="signup-section">
        <div class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="signInSignUpModal">
                            <div class="signup-form">
                                <h4>Sign In</h4>
                                <h5>Welcome back! Please sign in with your account</h5>
                                <form wire:submit.prevent='userLogin'>

                                    <div class="mb-3">
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger text-center">{{ session('error') }}</div>
                                        @endif
                                        @if (session()->has('success'))
                                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                                        @endif
                                        <label for="email" class="form-label">Enter Username or email</label>
                                        <input type="email" wire:model.blur='email' class="form-control"
                                            id="email">
                                        @error('email')
                                            <p class="text-danger font-size-12">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Enter password</label>
                                        <input type="password" wire:model.blur='password' class="form-control"
                                            id="password">
                                        @error('password')
                                            <p class="text-danger font-size-12">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 forgot">
                                        <a href="/user-reset-password" wire:navigate>Forgot your password?</a>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{!! loadingStateWithText('userLogin', 'Sign in to your account') !!}</button>
                                    <p>Don't have an account? <a href="/register" wire:navigate>Sign up</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
