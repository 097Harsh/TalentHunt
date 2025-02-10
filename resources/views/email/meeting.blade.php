<!DOCTYPE html>
<html>
<head>
    <title>Interview Schedule Notification</title>
</head>
<body style="font-family: 'Arial', sans-serif; background-color: #f9f9f9; padding: 20px; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #0073e6;">Your Interview is Scheduled</h2>
        <p>Dear Candidate,</p>
        <p>We are pleased to inform you that your interview has been scheduled. Please find the meeting details below:</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px; font-weight: bold;">Meeting ID:</td>
                <td style="padding: 10px;">{{ $meetingId }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; font-weight: bold;">Join URL:</td>
                <td style="padding: 10px;"><a href="{{ $joinUrl }}" style="color: #0073e6;">Join Meeting</a></td>
            </tr>
            <tr>
                <td style="padding: 10px; font-weight: bold;">Meeting Password:</td>
                <td style="padding: 10px;">{{ $password }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; font-weight: bold;">Scheduled Time:</td>
                <td style="padding: 10px;">{{ $interviewTime }}</td>
            </tr>
        </table>

        <p style="margin-top: 20px;">Please ensure that you join the meeting on time. If you have any questions or need further assistance, feel free to contact us.</p>
        <p>Best regards,</p>
        <p><strong>TalentHunt</strong></p>
    </div>
</body>
</html>
