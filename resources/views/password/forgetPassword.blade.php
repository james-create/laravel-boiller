<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
            text-align: center;
        }
        a.button {
            display: block;
            margin: 20px auto;
            text-align: center;
            text-decoration: none;
            background-color: #008CBA;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        a.button:hover {
            background-color: #0077A6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forget Password Email</h1>
        <p>You can reset your password by clicking the link below:</p>
        <a class="button" href="{{ route('reset.password.get', $token) }}">Reset Password</a>
    </div>
</body>
</html>
