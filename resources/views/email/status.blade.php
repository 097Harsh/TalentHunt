<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
        }
        .status {
            font-weight: bold;
            color: #FF5722;
        }
        .footer {
            font-size: 14px;
            color: #888;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Dear {{ $name }},</h2>
        <p>Your application for the position of <strong>{{ $title }}</strong> has been <span class="status">{{ $status }}</span>.</p>
        <p>Thank you for applying. We will keep you updated on further steps.</p>
        <p>Best Regards,<br><strong>TalentHunt Team</strong></p>
        <div class="footer">
            <p>Need help? Contact us at <a href="mailto:support@talenthunt.com">support@talenthunt.com</a></p>
        </div>
    </div>
</body>
</html>
