<?php
require_once "classes/Spravy.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_sprava'])) {
        $ID = $_POST['delete_sprava'];
        $db = new Spravy();
        $db->deleteSpravu($ID);
        header("Location: spravy.php");
        exit();
    }
    if (isset($_POST['meno']) && isset($_POST['email']) && isset($_POST['sprava'])) {
        $meno = trim($_POST['meno']);
        $email = trim($_POST['email']);
        $sprava = trim($_POST['sprava']);

        $kontakt = new Spravy();
        $ulozene = $kontakt->ulozitSpravu($meno, $email, $sprava);
        header("Location: thankyou.php");
        exit();
    }
    }
?>