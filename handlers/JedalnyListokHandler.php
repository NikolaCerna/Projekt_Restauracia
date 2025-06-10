<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once (__ROOT__ . "/classes/JedalnyListok.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_jedlo'])) {
        $nazov = $_POST['nazov'];
        $url_obrazka = $_POST['url_obrazka'];
        $popis = $_POST['popis'];
        $cena = $_POST['cena'];
        $kategoria = $_POST['kategoria'];

        $db = new JedalnyListok();
        $db->addJedlo($nazov, $url_obrazka, $popis, $cena, $kategoria);

        header("Location: index.php");
        exit();
    }
    if (isset($_POST['update_jedlo'])) {
        $ID = $_POST['update_jedlo'];
        $url_obrazka = $_POST['url_obrazka'];
        $nazov = $_POST['nazov'];
        $popis = $_POST['popis'];
        $cena = $_POST['cena'];
        $kategoria = $_POST['id_kategoria'];
        $db = new JedalnyListok();
        $db->updateJedlo($ID, $nazov, $url_obrazka, $popis, $cena, $kategoria);
        header("Location: index.php");
        exit();
    }
    if (isset($_POST['delete_jedlo'])) {
        $ID = $_POST['delete_jedlo'];
        $db = new JedalnyListok();
        $db->deleteJedlo($ID);
        header("Location: index.php");
        exit();
    }
}
?>