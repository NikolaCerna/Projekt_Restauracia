<?php
require_once "classes/InformacieJedla.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_about'])) {
        $ID = $_POST['update_about'];
        $icon = $_POST['icon'];
        $text = $_POST['text'];
        $db = new InformacieJedla();
        $db->updateInformacieJedla($ID, $icon, $text);
        header("Location: about.php");
        exit();
    }
}
?>