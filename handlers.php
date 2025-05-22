<?php
include_once "functions.php";
include_once "classes/JedalnyListok.php";
include_once "classes/Workers.php";
include_once "classes/Otazky.php";
include_once "classes/InformacieJedla.php";
include_once "classes/Obsah.php";
require_once "classes/Spravy.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    // Získame hodnoty z formulára
    $ID = $_POST['update'];
    $url_obrazka = $_POST['url_obrazka'];
    $nazov = $_POST['nazov'];
    $popis = $_POST['popis'];
    $cena = $_POST['cena'];
    $kategoria = $_POST['kategoria'];

    // Vytvoríme inštanciu triedy JedalnyListok a voláme metódu na update
    $db = new JedalnyListok();
    $db->updateJedlo($ID, $nazov, $url_obrazka, $popis, $cena, $kategoria);

    // Po úspešnom update presmerujeme na stránku (zobrazíme aktuálne dáta)
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_workers'])) {
    // Získame hodnoty z formulára
    $ID = $_POST['update_workers'];
    $url_obrazka = $_POST['url_fotografie'];
    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $pozicia = $_POST['pozicia'];
    $popis = $_POST['popis'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];
    // Vytvoríme inštanciu triedy JedalnyListok a voláme metódu na update
    $db = new Workers();
    $db->updateWorker($ID, $meno, $priezvisko, $pozicia, $popis, $facebook, $twitter, $instagram, $youtube, $url_obrazka);

    // Po úspešnom update presmerujeme na stránku (zobrazíme aktuálne dáta)
    header("Location: about.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about'])) {
    // Získame hodnoty z formulára
    $ID = $_POST['update_about'];
    $icon = $_POST['icon'];
    $text = $_POST['text'];
    $db = new InformacieJedla();
    $db->updateInformacieJedla($ID, $icon, $text);
    // Po úspešnom update presmerujeme na stránku (zobrazíme aktuálne dáta)
    header("Location: about.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_qna'])) {
    // Získame hodnoty z formulára
    $ID = $_POST['update_qna'];
    $otazka = $_POST['otazka'];
    $odpoved = $_POST['odpoved'];
    $db = new Otazky();
    $db->updateOtazky($ID, $otazka, $odpoved);

    header("Location: contact.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'], $_POST['nova_hodnota'])) {
    $id = (int)$_POST['update_id'];
    $novaHodnota = trim($_POST['nova_hodnota']);
    $db = new Obsah();
    $db->updateObsah($id, $novaHodnota);

    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id_a'], $_POST['nova_hodnota_a'])) {
    $id = (int)$_POST['update_id_a'];
    $novaHodnota = trim($_POST['nova_hodnota_a']);
    $db = new Obsah();
    $db->updateObsah($id, $novaHodnota);

    header("Location: about.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id_c'], $_POST['nova_hodnota_c'])) {
    $id = (int)$_POST['update_id_c'];
    $novaHodnota = trim($_POST['nova_hodnota_c']);
    $db = new Obsah();
    $db->updateObsah($id, $novaHodnota);

    header("Location: contact.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-worker'])) {
    $pozicia = $_POST['pozicia'];
    $popis = $_POST['popis'];
    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $url_fotografie = $_POST['url_fotografie'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];

    $db = new Workers();
    $db->addWorker($meno, $priezvisko, $pozicia, $popis, $facebook, $twitter, $instagram, $youtube, $url_fotografie);

    header("Location: about.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-qna'])) {
    $otazka = $_POST['otazka'];
    $odpoved = $_POST['odpoved'];

    $db = new Otazky();
    $db->insertOtazky($otazka, $odpoved);

    header("Location: contact.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $ID = $_POST['delete'];
    $db = new JedalnyListok();
    $db->deleteJedlo($ID);
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_sprava'])) {
    $ID = $_POST['delete_sprava'];
    $db = new Spravy();
    $db->deleteSpravu($ID);
    header("Location: spravy.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_worker'])) {
    $ID = $_POST['delete_worker'];
    $db = new Workers();
    $db->deleteWorker($ID);
    header("Location: about.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_qna'])) {
    $ID = $_POST['delete_qna'];
    $db = new Otazky();
    $db->deleteOtazky($ID);
    header("Location: contact.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $meno = $_POST['meno'] ?? '';
    $email = $_POST['email'] ?? '';
    $sprava = $_POST['sprava'] ?? '';

    $_SESSION['meno'] = $meno;
    $_SESSION['email'] = $email;
    $_SESSION['sprava'] = $sprava;

    $kontakt = new Spravy();
    $ulozene = $kontakt->ulozitSpravu($meno, $email, $sprava);

    if ($ulozene) {
        header("Location: thankyou.php");
        exit;
    } else {
        echo "Nastala chyba pri odosielaní správy.";
    }
}

?>