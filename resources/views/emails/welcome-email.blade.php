<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Ideas!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #1DA1F2;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
        }
        .content h2 {
            margin-top: 0;
        }
        .button {
            display: inline-block;
            background-color: #1DA1F2;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            background-color: #f4f4f4;
            padding: 10px;
            font-size: 12px;
            color: #888888;
        }
        .footer a {
            color: #1DA1F2;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Welcome to Ideas!</h1>
    </div>
    <div class="content">
        <h2>Hello, {{$user->name}}</h2>
        <p>We're excited to have you join our community of thinkers, dreamers, and creators! 🌟</p>
        <p>At <b>Our Ideas</b>, you can connect with like-minded people, share your thoughts, and discover new perspectives every day.</p>
    </div>
    <div class="footer">
        <p>You are receiving this email because you signed up for Ideas.</p>
        <p>&copy; 2024 Ideas, Inc. All rights reserved.</p>
    </div>
</div>
</body>
</html>
