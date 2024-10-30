<div>
    <style>
        .text-danger {
            text-align: left !important;
        }
    </style>
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Payment Method</h4>
                        <p>Choose your best payment method</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="step-content">
        <div class="container">
            <form action="{{ url('subscription-payment-level-one') }}" method="post" class="form-step">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page payment-page">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="selected-plan">
                                        <h4>Selected Plan : <span class="gold">GOLD</span>
                                            <span class="plan-price">${{ session('plan_price') }}</span>
                                        </h4>
                                    </div>
                                    <p>Think to Upgrade Plan? <a href="/subscription" wire:navigate>Click Here to Roll
                                            Back</a></p>
                                    <img class="img-fluid card-info"
                                        src="{{ asset('assets/app/images/card-information.jpg') }}"
                                        alt="Card Information" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-right">
                                        <div class="mb-4" style="display: none;">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" name='amount' value="{{ session('plan_price') }}"
                                                class="form-control card-number" />
                                        </div>

                                        <div class="mb-4">
                                            <label for="cc_number" class="form-label">Card
                                                Number</label>
                                            <input type="text" name='cc_number' class="form-control card-number"
                                                placeholder="1234    4567    8919    1234" />
                                            @error('cc_number')
                                                <p class="text-danger font-size-12">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4" style="text-align: left;">
                                            <label for="card_holder_name" class="form-label">Card
                                                Holder Name</label>
                                            <input type="text" name='card_holder_name' class="form-control"
                                                id="sddsd" placeholder='Card holder name' />
                                            @error('card_holder_name')
                                                <p class="text-danger font-size-12">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-right">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label for="expiry_month" class="form-label">Expiration
                                                        Month
                                                        (MM)</label>
                                                    <input type="number" max="2" name="expiry_month" class="form-control"
                                                        id="expiry_month" placeholder="MM">
                                                    @error('expiry_month')
                                                        <p class="text-danger font-size-12">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label for="expiry_year" class="form-label">Expiration
                                                        Year
                                                        (YYYY)</label>
                                                    <input type="number" name="expiry_year" class="form-control"
                                                        id="expiry_year" placeholder="YYYY">
                                                    @error('expiry_year')
                                                        <p class="text-danger font-size-12">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="cvv" class="form-label">CVV</label>
                                            <input type="text" name='cvv' class="form-control card-cww"
                                                id="ereterer" placeholder="CVV">
                                            @error('cvv')
                                                <p class="text-danger font-size-12">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="payment-option">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Package Plan - Gold</td>
                                                    <td style="text-align: center;"> - </td>
                                                    <td style="text-align: right;">${{ session('plan_price') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>

                                                    <td style="text-align: right;"><span class="subtotal">Subtotal:
                                                            ${{ session('plan_price') }}.00</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="make-payment">
                                        <button type="submit" value="Submit" class="btn btn-payment">Make
                                            Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
