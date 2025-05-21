<?php
session_start();
$meno = $_SESSION['meno'] ?? 'Návštevník';
$email = $_SESSION['email'] ?? 'neuvedený';
$sprava = $_SESSION['sprava'] ?? 'bez správy';

// vymažeme údaje zo session, aby tam neostali po refreshe
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Ďakujeme!</title>
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
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #006f94;
        }
    </style>
</head>
<body>
<div class="box">
    <h1>Ďakujeme, <?= $meno ?>!</h1>
    <p>Vaša správa bola úspešne odoslaná.</p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Správa:</strong><br><?= $sprava ?></p>

    <form action="contact.php" method="get">
        <button type="submit">Späť na kontakt</button>
    </form>
</div>
</body>
</html>