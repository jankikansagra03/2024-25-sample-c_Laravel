<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response to Your FAQ</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #333;">Dear {{ $faq->name }},</h2>

        <p>Thank you for submitting your question to our FAQ section. We appreciate your interest and the opportunity to assist you.</p>

        <div style="background-color: #f0f0f0; padding: 15px; margin: 20px 0; border-left: 4px solid #333;">
            <p><strong>Your Question:</strong></p>
            <p>{{ $faq->message }}</p>
        </div>

        <div style="background-color: #e6f7ff; padding: 15px; margin: 20px 0; border-left: 4px solid #0066cc;">
            <p><strong>Our Response:</strong></p>
            <p>{{ $faq->reply }}</p>
        </div>

        <p>We hope this information addresses your query satisfactorily. If you have any further questions or need additional clarification, please don't hesitate to reach out to us.</p>

        <p>Thank you for your interest in our services.</p>

        <p>Best regards,<br>
        The Support Team</p>
    </div>
</body>
</html>
