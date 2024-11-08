<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lost Pet Claim Notification</title>
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
            <h1>Email Verification</h1>
        </div>
        <div class="content">
            <p>Hello {{ $name }},</p>
            <p>Your verification code is: <strong>{{ $verification_code }}</strong></p>
            <p>Please enter this code to complete your registration.</p>
        </div>
        <div class="footer">
            <p>Thank you,</p>
            <p>The Chasetail Team</p>
        </div>
    </div>
</body>

</html>
