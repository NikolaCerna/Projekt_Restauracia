<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Ďakujeme za registráciu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f0f0f0;
        }
        .box {
            background: white;
            padding: 30px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="box">
    <h1>Ďakujeme za registráciu!</h1>
    <p>Vaša registrácia prebehla úspešne.</p>
    <p>Teraz sa môžete prihlásiť do svojho účtu.</p>
    <form action="login.php" method="get">
        <button type="submit">Prejsť na prihlásenie</button>
    </form>
</div>
</body>
</html>
