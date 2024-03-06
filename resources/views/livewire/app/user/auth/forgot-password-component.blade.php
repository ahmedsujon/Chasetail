<div>
    <div class="signInSignUpModal">
        <div class="modal fade" id="signInModal" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Forgot Password?</h4>

                        <h5>
                            @if (session()->has('error'))
                                <div class="alert alert-danger text-center">{{ session('error') }}</div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success text-center">{{ session('success') }}</div>
                            @endif
                        </h5>

                        <form wire:submit.prevent='sendEmail'>
                            <div class="mb-3">
                                <label for="email" class="form-label">Enter email</label>
                                <input type="email" class="form-control" wire:model.blur='email' id="email">
                                @error('email')
                                    <p class="text-danger font-size-12">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" wire:click.prevent="sendEmail"
                                class="btn btn-primary">{!! loadingStateWithText('sendEmail', 'Send Code') !!}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
