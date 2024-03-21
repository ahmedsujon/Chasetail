<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="{{ url('charge') }}" method="post">
            @csrf
            <p><input type="text" name="amount" placeholder="Enter Amount" /></p>
            <p><input type="text" name="cc_number" placeholder="Card Number" /></p>
            <p><input type="text" name="expiry_month" placeholder="Month" /></p>
            <p><input type="text" name="expiry_year" placeholder="Year" /></p>
            <p><input type="text" name="cvv" placeholder="CVV" /></p>
            <input type="submit" name="submit" value="Submit" />
        </form>
    </div>
</body>

</html>
