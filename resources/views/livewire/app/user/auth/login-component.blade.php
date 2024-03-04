<div>
    <div class="signInSignUpModal">
        <div class="modal fade" id="signInModal" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Sign In</h4>
                        <h5>Welcome back! Please sign in with your account</h5>
                        <form wire:submit.prevent='userLogin'>
                            <div class="mb-3">
                                <label for="email" class="form-label">Enter email</label>
                                <input type="email" class="form-control" wire:model='email' id="email">
                                @error('email')
                                    <p class="text-danger font-size-12">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Enter password</label>
                                <input type="password" wire:model='password' class="form-control" id="password">
                                @error('password')
                                    <p class="text-danger font-size-12">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 forgot">
                                <a href="#">Forgot your password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary">{!! loadingStateWithText('userLogin', 'Sign in to your account') !!}</button>
                            <p>Don't have an account? <a href="#" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#signUpModal">Sign up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
