<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #0275d8;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-header h1 {
            font-size: 24px;
            margin: 0;
        }
        .email-body {
            padding: 20px;
        }
        .email-body h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333333;
        }
        .email-body p {
            margin: 8px 0;
            font-size: 16px;
            color: #555555;
        }
        .email-footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777777;
        }
        .email-footer a {
            color: #0275d8;
            text-decoration: none;
        }
        .btn-download {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #0275d8;
            color: #ffffff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-download:hover {
            background-color: #C80A95;
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header -->
    <div class="email-header">
        <h1>PDF Attachment</h1>
    </div>

    <!-- Body -->
    <div class="email-body">
        <h2>Contact Details</h2>
        <p><strong>Customer Email:</strong> {{ $data['email'] }} </p>
        <p><strong>Issue:</strong> {{ $data['subject'] }} </p>
        <p><strong>Dear customer,</strong></p>
        <p>{{ $data['message'] }}</p>
        <a href="{{ $data['file_path'] }}" target="_blank" class="btn-download" style="color: #ffffff;">Download Attached File</a>
    </div>

    <!-- Footer -->
    <div class="email-footer">
        <p>If you have any questions, reply to this email or contact us <a href="#">here</a>.</p>
    </div>
</div>
</body>
</html>

