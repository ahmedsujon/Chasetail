<div>
    <!-- Sign In Modal -->
    <div class="signInSignUpModal" wire:ignore>
        <div class="modal fade" id="signUpModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Sign Up</h4>
                        <h5>New customer? Please create your account first</h5>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">full name</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">email address</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <button type="submit" class="btn btn-primary">create your account</button>
                            <p class="click">By clicking "<span>Create Your Account</span>", you agree to our
                                <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.
                            </p>
                            <p>Have an account? <a href="#" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#signInModal">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
