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
            font-size: 24px;
            margin-bottom: 20px;
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
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            .email-container {
                padding: 15px;
                margin: 10px auto;
            }
            h2 {
                font-size: 20px;
            }
            p {
                font-size: 14px;
            }
            .footer {
                font-size: 12px;
            }
        }

        @media only screen and (max-width: 400px) {
            h2 {
                font-size: 18px;
            }
            p {
                font-size: 13px;
            }
            .footer {
                font-size: 11px;
            }
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