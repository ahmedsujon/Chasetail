<div>
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Found Pet Report</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="step-content">
        <div class="container">
            <form class="form-step" wire:submit.prevent="storeData">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page">
                            <div class="row">
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-right">

                                        <div class="mb-4">
                                            <label for="breed" class="form-label">Dog's
                                                Breed?</label>
                                            <input type="text" wire:model.blur="breed" class="form-control"
                                                placeholder="Dog's breed">
                                            @error('breed')
                                                <span class="label-bot-validate">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="color" class="form-label">Color</label>
                                            <input type="text" wire:model.blur="color" class="form-control"
                                                placeholder="Dog's color">
                                            @error('color')
                                                <span class="label-bot-validate">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4" style="text-align: left;">
                                            <label for="exampleFormControlInput1" class="form-label">Your Dog is
                                                a</label>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic radio toggle button group">

                                                <input type="radio" wire:model.blur="gender" value="Male"
                                                    class="btn-check" name="btnradio" id="Male" autocomplete="off"
                                                    checked>
                                                <label class="btn btn-outline-secondary btn-male"
                                                    for="Male">Male</label>

                                                <input type="radio" wire:model.blur="gender" value="Female"
                                                    class="btn-check" name="btnradio" id="Female" autocomplete="off">
                                                <label class="btn btn-outline-secondary btn-female"
                                                    for="Female">Female</label>

                                                <input type="radio" wire:model.blur="gender" value="Unknown"
                                                    class="btn-check" name="btnradio" id="Unknown" autocomplete="off">
                                                <label class="btn btn-outline-secondary btn-unknown"
                                                    for="Unknown">Unknown</label>
                                            </div>
                                            @error('gender')
                                            <span class="label-bot-validate">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-right">
                                        <div class="mb-4">
                                            <label for="found_date" class="form-label">When you found this?</label>
                                            <input type="date" wire:model.blur="found_date" class="form-control"
                                                placeholder="Found date ( mm/dd/yyyy)">
                                                @error('found_date')
                                                <span class="label-bot-validate">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="microchip_id" class="form-label">What is your dog's
                                                Microchip ID?</label>
                                            <input type="text" wire:model.blur="microchip_id" class="form-control"
                                                placeholder="Enter microchip ID (optional)">
                                                @error('microchip_id')
                                                <span class="label-bot-validate">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-left-right">
                                        <div class="mb-4">
                                            <label for="description" class="form-label">What is you dog
                                                looks like?</label>
                                            <span class="label-bot"><a href="#">Describe their personality,
                                                    physical traits, etc.</a></span>
                                            <textarea class="form-control mt-4" wire:model.blur="description" rows="3"
                                                placeholder="Description ( 160 Words only )"></textarea>
                                                @error('description')
                                                <span class="label-bot-validate">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="form-left-right">
                            <button class="btn btn-submit-post" type="submit">{!! loadingStateWithText('storeData', 'Submit Post') !!}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
