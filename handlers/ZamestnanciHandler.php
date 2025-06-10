<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once (__ROOT__ . "/classes/Zamestnanci.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add-worker'])) {
        $pozicia = $_POST['pozicia'];
        $popis = $_POST['popis'];
        $meno = $_POST['meno'];
        $priezvisko = $_POST['priezvisko'];
        $url_fotografie = $_POST['url_fotografie'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];
        $youtube = $_POST['youtube'];
        $db = new Zamestnanci();
        $db->addWorker($meno, $priezvisko, $pozicia, $popis, $facebook, $twitter, $instagram, $youtube, $url_fotografie);
        header("Location: about.php");
        exit();
    }
    if (isset($_POST['update_workers'])) {
        $ID = $_POST['update_workers'];
        $url = $_POST['url_fotografie'];
        $meno = $_POST['meno'];
        $priezvisko = $_POST['priezvisko'];
        $pozicia = $_POST['pozicia'];
        $popis = $_POST['popis'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];
        $youtube = $_POST['youtube'];
        $db = new Zamestnanci();
        $db->updateWorker($ID, $meno, $priezvisko, $pozicia, $popis, $facebook, $twitter, $instagram, $youtube, $url);
        header("Location: about.php");
        exit();
    }
    if (isset($_POST['delete_worker'])) {
        $ID = $_POST['delete_worker'];
        $db = new Zamestnanci();
        $db->deleteWorker($ID);
        header("Location: about.php");
        exit();
    }
}
?>