<div>
    <section class="payment-success">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="payment-success-content">
                        <h4>Payment Successful !</h4>
                        <img class="img-fluid" src="{{ asset('assets/app/images/icon-payment-success.png') }}"
                            alt="Payment Success" />
                        <table class="table ">
                            <tbody>
                                <tr>
                                    <td>Amount paid</td>
                                    <td>${{ request()->query('amount') }}</td>
                                </tr>
                                <tr>
                                    <td>Transaction id</td>
                                    <td>{{ $transaction_id }}</td>
                                </tr>
                                <tr>
                                    <td>Date / Time</td>
                                    <td>{{ now()->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @if ($plan = 'PlanA')
                                <a href="/text-plan-report" wire:navigate class="btn btn-primary">Get
                                    Started</a>
                            @elseif($plan = 'PlanB')
                                <a href="/plan-one-report" wire:navigate class="btn btn-primary">Get
                                    Started</a>
                            @elseif($plan = 'PlanC')
                                <a href="/plan-two-report" wire:navigate class="btn btn-primary">Get
                                    Started</a>
                            @elseif($plan = 'PlanD')
                                <a href="/plan-three-report" wire:navigate class="btn btn-primary">Get
                                    Started</a>
                            @elseif($plan = 'PlanE')
                                <a href="/plan-four-report" wire:navigate class="btn btn-primary">Get
                                    Started</a>
                            @endif
                            <button type="button" class="btn btn-primary close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
