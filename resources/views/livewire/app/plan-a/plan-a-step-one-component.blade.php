<div>
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px;
            border: 1px solid #d0cccc;
            text-align: left;
            border-radius: 5px;
            padding: 11px;
            background: none;
        }

        .select2-container--default .select2-selection--single {
            background-color: #f7f7f7 !important;
            border: none !important;
            border-radius: 0px;
        }

        .select2-search--dropdown .select2-search__field {
            padding: 10px !important;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Posting as Free User</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="step-content mb-5">
        <div class="container">
            <form class="form-step" wire:submit.prevent="storeData">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page">
                            <div class="row">
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-right">

                                        <div class="mb-4">
                                            <label for="exampleFormControlInput1" class="form-label">Dog Name</label>
                                            <input type="text" wire:model.blur="name" class="form-control"
                                                placeholder="Enter dog name">
                                            @error('name')
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
                                            <label for="exampleFormControlInput1" class="form-label">When was your dog
                                                last seen?</label>
                                            <input type="date" wire:model.blur="last_seen" class="form-control"
                                                placeholder="Lost date ( mm/dd/yyyy)">
                                            @error('last_seen')
                                                <span class="label-bot-validate">{{ $message }}</span>
                                            @enderror
                                            <span class="label-bot">It may take 24 hours for this pet to be reported in
                                                our database - check back often!</span>
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleFormControlInput1" class="form-label">What is your
                                                dog's
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
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="form-left-right">
                                        <div class="mb-4">
                                            <label for="exampleFormControlInput1" class="form-label">Add food & medicine
                                                information</label>
                                            <span class="label-bot"><a href="#">Describe dog food & medicine
                                                    information etc.</a></span>
                                            <textarea class="form-control mt-4" wire:model.blur="medicine_info" rows="3"
                                                placeholder="Description dog food & medicine information"></textarea>
                                            @error('medicine_info')
                                                <span class="label-bot-validate">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="form-left-right">
                                        <div class="mb-4">
                                            <label for="exampleFormControlInput1" class="form-label">What does your dog
                                                look like?</label>
                                            <span class="label-bot"><a href="#">Describe their personality,
                                                    physical traits, etc.</a></span>
                                            <textarea class="form-control mt-4" wire:model.blur="description" rows="3" maxlength="100"
                                                placeholder="Description (100 characters only)"></textarea>
                                            @error('description')
                                                <span class="label-bot-validate">{{ $message }}</span>
                                            @enderror
                                            <div style="text-align: right;" class="mt-2">
                                                <small>{{ $characterCount }} / {{ $maxCharacters }} characters</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-left-right">
                            <button class="btn btn-submit-post" type="submit">{!! loadingStateWithText('storeData', 'Submit Post') !!}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
