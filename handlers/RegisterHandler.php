<?php
include_once(__ROOT__ . '/classes/Users.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$meno = $_POST['meno'];
$email = $_POST['email'];
$heslo = $_POST['heslo'];

$user = new Users();
$ok = $user->register($meno, $email, $heslo);

if ($ok) {
    header("Location: thankyoupage.php");
    exit;
} else {
    $error = "Registrácia zlyhala. Email môže byť už registrovaný.";
}

}
?>