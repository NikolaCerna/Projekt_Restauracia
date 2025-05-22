<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You!</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .thankyou-box {
            background: white;
            padding: 40px 50px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #333;
        }
        p {
            margin: 20px 0;
            color: #555;
        }
        a.button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
        a.button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="thankyou-box">
    <h1>Thank you for registering!</h1>
    <p>Your account has been successfully created.</p>
    <a href="../index.php" class="button">Return to Homepage</a>
</div>
</body>
</html>
