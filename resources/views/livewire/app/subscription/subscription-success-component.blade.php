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
                            <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Visit Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
