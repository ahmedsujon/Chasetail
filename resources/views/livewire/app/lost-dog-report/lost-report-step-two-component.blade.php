<div>
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Posting as Starter or Free User</h4>
                        <p>Update Plan? <a href="#">Roll-Back</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="step-content">
        <div class="container">
            <form class="form-step" wire:submit.prevent="lostDogReportTwo">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page">
                            <h3>{{ session('longitude') }}</h3>
                            <h3>Add your dog photo</h3>
                            <p>Photo quality will affect your search results. Please select a clear image of one pet
                                looking directly at the camera.</p>
                            <!-- Image Upload -->
                            <div class="image-upload">
                                <div class="mb-4 d-flex justify-content-center">
                                    <img id="selectedImage" src="{{ asset('assets/app/images/icon-upload.png') }}"
                                        alt="example placeholder" />
                                </div>

                                <div class="col-md-12">
                                    <label for="example-number-input" class="col-form-label">Image</label>
                                    <input type="file" class="form-control" wire:model.blur='images' />
                                    @error('images')
                                        <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                    @enderror

                                    <div wire:loading wire:target='image' wire:key='image'>
                                        <span class="spinner-border spinner-border-xs" role="status"
                                            aria-hidden="true"></span> <small>Uploading</small>
                                    </div>
                                    @if ($images)
                                        <img src="{{ $images->temporaryUrl() }}" class="img-fluid mt-2"
                                            style="height: 55px; width: 55px;" />
                                    @endif
                                </div>

                                {{-- <div class="d-flex justify-content-center">
                                    <div class="">
                                        <label class="form-label m-1" for="customFile1">Photo Upload</label>
                                        <p class="drag">Drag and drop to upload or browse</p>
                                        <input type="file" wire:model.blur="image" class="form-control d-none" />
                                        @error('image')
                                            <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                        @enderror
                                        <div wire:loading wire:target='image' wire:key='image'>
                                            <span class="spinner-border spinner-border-xs" role="status" aria-hidden="true"></span>
                                            <small>Uploading</small>
                                        </div>
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid mt-2" style="height: 55px; width: 55px;" />
                                        @endif
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary mt-3">Next</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
