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
                                        <input type="text" wire:model.blur='name' class="form-control" id="name">
                                        @error('name')
                                            <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">email address</label>
                                        <input type="email" wire:model.blur='email' class="form-control" id="email">
                                        @error('email')
                                            <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">password</label>
                                        <input type="password" wire:model.blur='password' class="form-control" id="password">
                                        @error('password')
                                            <p class="text-danger font-size-12 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{!! loadingStateWithText('userRegistration', 'Create Your Account') !!}</button>
                                    <p class="click">By clicking "<span>Create Your Account</span>", you agree to our
                                        <a href="#">Terms & Conditions</a> and <a href="#">Privacy
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
