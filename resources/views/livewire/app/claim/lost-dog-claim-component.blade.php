<div>
    <div class="contaier">
        <section id="page-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="page-header-text">
                            <h4>Claim Lost Pet</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Page Content -->
        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-2"></div>
                    <div class="col-md-8 col-lg-8 col-8">
                        <div class="contact-right">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            {{-- <h4>Get in touch</h4> --}}
                            <form class="form-contact" wire:submit.prevent='storeData'>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" wire:model="name" class="form-control" required>
                                            @error('name')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" wire:model="email" class="form-control" id="email"
                                                required>
                                            @error('email')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" wire:model="phone" class="form-control" required>
                                            @error('phone')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="descriptions" class="form-label">Your message</label>
                                    <textarea class="form-control" wire:model="descriptions" id="descriptions" rows="5" required></textarea>
                                    @error('descriptions')
                                        <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="width100 float-start text-start">
                                    <button type="submit" class="btn btn-contact">
                                        {!! loadingStateWithText('storeData', 'Submit') !!}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-2"></div>
                </div>
            </div>
        </section>
    </div>
</div>
