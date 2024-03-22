<div>
    <div>
        <div class="container mt-5 mb-5">
            <form action="{{ url('payment') }}" method="post">
                @csrf


                <p><input type="text" name="amount" readonly value="{{ session('plan_price') }}" placeholder="Enter Amount" /></p>

                <p><input type="text" name="cc_number" placeholder="Card Number" /></p>
                <p><input type="text" name="expiry_month" placeholder="Month" /></p>
                <p><input type="text" name="expiry_year" placeholder="Year" /></p>
                <p><input type="text" name="cvv" placeholder="CVV" /></p>
                <input type="submit" name="submit" value="Submit" />
            </form>
        </div>
    </div>
</div>
