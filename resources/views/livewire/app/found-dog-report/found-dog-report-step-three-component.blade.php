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
                        <h4>Describe Your Pet</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="step-content mb-5">
        <div class="container">
            @auth
                <form class="form-step" wire:submit.prevent="submitData">
                @else
                    <form class="form-step" wire:submit.prevent="storeData">
                    @endauth
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-12">
                            <div class="step-page">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-12">
                                        <div class="form-left-right">
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1" class="form-label">Pet
                                                    Name</label>
                                                <input type="text" wire:model.blur="name" class="form-control"
                                                    placeholder="Enter pet name">
                                                @error('name')
                                                    <span class="label-bot-validate">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-4" style="text-align: left;">
                                                <label for="gender" class="form-label">Your Pet is
                                                    a</label>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">

                                                    <input type="radio" wire:model.blur="gender" value="Male"
                                                        class="btn-check" name="btnradio" id="Male"
                                                        autocomplete="off" checked>
                                                    <label class="btn btn-outline-secondary btn-male"
                                                        for="Male">Male</label>

                                                    <input type="radio" wire:model.blur="gender" value="Female"
                                                        class="btn-check" name="btnradio" id="Female"
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-secondary btn-female"
                                                        for="Female">Female</label>

                                                    <input type="radio" wire:model.blur="gender" value="Unknown"
                                                        class="btn-check" name="btnradio" id="Unknown"
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-secondary btn-unknown"
                                                        for="Unknown">Unknown</label>
                                                </div>
                                                @error('gender')
                                                    <span class="label-bot-validate">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="breed" class="form-label">Pet's Breed?</label>
                                                <input type="text" wire:model.blur="breed" class="form-control"
                                                    placeholder="Enter pet breed">
                                                @error('breed')
                                                    <span class="label-bot-validate">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-12">
                                        <div class="form-left-right">
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1" class="form-label">When you found the pet?</label>
                                                <input type="date" wire:model.blur="found_date" class="form-control"
                                                    placeholder="Lost date ( mm/dd/yyyy)" max="{{ date('Y-m-d') }}"
                                                    max="{{ date('Y-m-d') }}">
                                                @error('found_date')
                                                    <span class="label-bot-validate">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="color" class="form-label">Pet Color</label>
                                                <input type="text" wire:model.blur="color" class="form-control"
                                                    placeholder="Describe pets color (10 characters max )"
                                                    maxlength="10">
                                                @error('color')
                                                    <span class="label-bot-validate">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="marking" class="form-label">Marking</label>
                                                <input type="text" wire:model.blur="marking" class="form-control"
                                                    placeholder="Describe pets marking (20 characters max) (Optional)"
                                                    maxlength="20">
                                                @error('marking')
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
                                                <label for="exampleFormControlInput1" class="form-label">Brief
                                                    Description</label>
                                                <textarea class="form-control" wire:model.blur="description" rows="3" maxlength="150"
                                                    placeholder="ie. Pink collar, three legs, deaf, friendly, needs medicine (150 characters only)"></textarea>
                                                @error('description')
                                                    <span class="label-bot-validate">{{ $message }}</span>
                                                @enderror
                                                <div style="text-align: right;" class="mt-2">
                                                    <small>{{ $characterCount }} / {{ $maxCharacters }}
                                                        characters</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                @auth
                                    <button type="submit" class="btn btn-primary mt-3">
                                        {!! loadingStateWithText('submitData', 'Submit') !!}
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary mt-3">Next</button>
                                @endauth
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section>
</div>
