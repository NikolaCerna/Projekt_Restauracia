<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once (__ROOT__ . "/classes/InformacieJedla.php");
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