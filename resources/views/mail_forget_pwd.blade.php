<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }

        .content {
            padding: 20px 0;
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
            <h1>Password Reset OTP</h1>
        </div>
        <div class="content">
            <p>Hello {{ $data3['name'] }},</p>
            <p>We received a request to reset your password. Please use the following One-Time Password (OTP) to
                complete the process:</p>
            <h2 style="text-align: center; color: #007bff;">{{ $data3['otp'] }}</h2>
            <p>If you didn't request a password reset, please ignore this email or contact our support team if you have
                any concerns.</p>
            <p>This OTP will expire in 15 minutes for security reasons.</p>
            <p>Thank you for using our service!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
