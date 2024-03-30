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
            <form class="form-step">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page">
                            <h3>Add your dog photo</h3>
                            <p>Photo quality will affect your search results. Please select a clear image of one pet looking directly at the camera.</p>
                            <!-- Image Upload -->
                            <div class="image-upload">
                                <div class="mb-4 d-flex justify-content-center">
                                    <img id="selectedImage" src="{{ asset('assets/app/images/icon-upload.png') }}"
                                    alt="example placeholder" />
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="">
                                        <label class="form-label m-1" for="customFile1">Photo Upload</label>
                                        <p class="drag">Drag and drop to upload or browse</p>
                                        <input type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/lost-dog-report-third" wire:navigate class="btn btn-primary mt-3" type="button">Next</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

</div>
