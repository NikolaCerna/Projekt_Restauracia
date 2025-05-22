<?php
require_once "classes/Otazky.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add-qna'])) {
        $otazka = $_POST['otazka'];
        $odpoved = $_POST['odpoved'];
        $db = new Otazky();
        $db->addOtazky($otazka, $odpoved);
        header("Location: contact.php");
        exit();
    }
    if (isset($_POST['update_qna'])) {
        $ID = $_POST['update_qna'];
        $otazka = $_POST['otazka'];
        $odpoved = $_POST['odpoved'];
        $db = new Otazky();
        $db->updateOtazky($ID, $otazka, $odpoved);
        header("Location: contact.php");
        exit();
    }
    if (isset($_POST['delete_qna'])) {
        $ID = $_POST['delete_qna'];
        $db = new Otazky();
        $db->deleteOtazky($ID);
        header("Location: contact.php");
        exit();
    }
}
?>