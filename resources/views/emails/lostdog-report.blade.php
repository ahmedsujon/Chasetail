<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lost Dog Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
        }

        .content {
            margin-bottom: 20px;
        }

        .dog-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Lost Dog Alert</h1>
        </div>
        <div class="content">
            <p>A dog named <strong>{{ $name }}</strong> was last seen on <strong>{{ $last_seen }}</strong>.
            </p>
            <p><strong>Gender:</strong> {{ $gender }}</p>
            <p><strong>Color:</strong> {{ $color }}</p>
            <p><strong>Breed:</strong> {{ $breed }}</p>
            <p><strong>Address:</strong> {{ $address }}</p>
            <p><strong>Medicine information:</strong> {{ $medicine_info }}</p>
            <p><strong>Description:</strong> {{ $description }}</p>
            @if ($images)
                <p><a href="https://chasetail.com/lostdogs/details/{{ $id }}"><strong>More details &
                            photo</strong></a> </p>
                {{-- <img src="https://chasetail.com/{{ $images }}" alt="Lost Dog Image" class="dog-image"> --}}
                <img src="http://chasetail.test/{{ $images }}" alt="Lost Dog Image" class="dog-image">
            @endif
            <p>We appreciate your help in finding our lost dog. Thank you for keeping an eye out!</p>
        </div>
        <div class="footer">
            <p>Thank you,</p>
            <p>The Lost Dog Team</p>
        </div>
    </div>
</body>

</html>
