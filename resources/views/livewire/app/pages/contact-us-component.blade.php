<div>
    <div class="contaier">
        <section id="page-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="page-header-text">
                            <h4>Contact Us</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Page Content -->
        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-12">
                        <div class="contact-left">
                            <img src="{{ asset('assets/app/images/contact-pet.jpg') }}" class="img-fluid mt-4 mb-5"
                                alt="Contact Dog" />

                            <ul>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>209 State Hwy 121 BYP,
                                    Lewisville, TX 75067</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                        href="mailto:info@chasetail.com">info@chasetail.com</a></li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+18555508245">
                                        855-550-8245</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8 col-12">
                        <div class="contact-right">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h4>Get in touch</h4>
                            <form class="form-contact" wire:submit.prevent='storeData'>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" wire:model="name" class="form-control">
                                            @error('name')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" wire:model="email" class="form-control"
                                                id="email">
                                            @error('email')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" wire:model="phone" class="form-control">
                                            @error('phone')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" wire:model="subject" class="form-control"
                                                id="subject">
                                            @error('subject')
                                                <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="form-label">Your message</label>
                                    <textarea class="form-control" wire:model="message" id="message" rows="5"></textarea>
                                    @error('message')
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
                </div>
            </div>
        </section>
    </div>
</div>
