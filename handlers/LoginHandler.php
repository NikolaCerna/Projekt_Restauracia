<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__ . '/classes/Users.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];

    try {
        $user = new Users();
        $user->login($email, $heslo);
        header("Location: ../index.php");
        exit;
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
