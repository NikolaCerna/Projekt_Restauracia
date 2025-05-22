<?php
include_once "functions.php";
include_once "classes/JedalnyListok.php";
include_once "classes/Zamestnanci.php";
include_once "classes/Otazky.php";
include_once "classes/InformacieJedla.php";
include_once "classes/Obsah.php";
require_once "classes/Spravy.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //JedalnyListok CRUD
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
        $ID = $_POST['update'];
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

    //Zamestnanci CRUD
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

    //Otazky a odpovede CRUD
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

    //InformacieJedla RU
    if (isset($_POST['update_about'])) {
        $ID = $_POST['update_about'];
        $icon = $_POST['icon'];
        $text = $_POST['text'];
        $db = new InformacieJedla();
        $db->updateInformacieJedla($ID, $icon, $text);
        header("Location: about.php");
        exit();
    }

    //Spravy RD
    if (isset($_POST['delete_sprava'])) {
        $ID = $_POST['delete_sprava'];
        $db = new Spravy();
        $db->deleteSpravu($ID);
        header("Location: spravy.php");
        exit();
    }

    //Obsah RU
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