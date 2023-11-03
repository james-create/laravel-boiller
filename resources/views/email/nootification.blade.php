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
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }
        a.button {
            display: block;
            width: 200px;
            margin: 0 auto;
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

        <h1>Dear {{ $full_name }}, Your application was submitted successfully.</h1>
        <p>We have received your application. We will review it and get back to you within 24 hours with further details.</p>
        <a class="button" href="#">KILIFI SCHOOL TEAM</a>
        {{-- <p></p> --}}
    </div>
</body>
</html>
