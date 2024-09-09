<div>
    <style>
        .drop-container {
            height: 270px !important;
        }
    </style>
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
            <form class="form-step" wire:submit.prevent="planBStepTwo">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page">
                            <h3>Add your dog photo</h3>
                            <p>Photo quality will affect your search results. Please select a clear image of one pet
                                looking directly at the camera.</p>
                            <label for="images" class="drop-container" id="dropcontainer">
                                <span class="drop-title">Upload your dogs photos</span>
                                <input type="file" wire:model.blur="images" id="images" accept="image/*"
                                    style="display:none;" required>
                                @error('images')
                                    <p class="text-danger" style="font-size: 16px;">{{ $message }}</p>
                                @enderror
                            </label>
                            <div wire:loading wire:target='images' wire:key='images'>
                                <span class="spinner-border spinner-border-xs" role="status"></span>
                                <small>Uploading</small>
                            </div>
                            @if ($images)
                                <img src="{{ $images->temporaryUrl() }}" class="img-fluid mt-2"
                                    style="margin-top: -20.4rem !important; height: 260px !important" />
                            @endif
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
