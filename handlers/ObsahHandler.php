<?php
require_once "classes/Obsah.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_obsah'])) {
        $id = $_POST['update_obsah'];
        $novaHodnota = $_POST['nova_hodnota'];
        $db = new Obsah();
        $db->updateObsah($id, $novaHodnota);
        $redirect = $_POST['redirect'];
        header("Location: $redirect");
        exit();
    }
}
?>