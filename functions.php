<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', __DIR__);
}

include_once "classes/JedalnyListok.php";
include_once "classes/Workers.php";
include_once "classes/QNA.php";
include_once "classes/About.php";


function generateMenu($kategoria) {
    $db = new JedalnyListok();
    $jedalnyListok = $db->getJedalnyListok();

    foreach ($jedalnyListok as $item) {
        if ($item['kategoria'] == $kategoria) {
            $nazov = $item['nazov'];
            $url_obrazka = $item['url_obrazka'];
            $popis = $item['popis'];
            $cena = $item['cena'];

            echo '<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
            echo '<figure>';
            echo '<img src="' . $url_obrazka . '" alt="' . $nazov . '" class="img-fluid tm-gallery-img" />';
            echo '<figcaption>';
            echo '<h4 class="tm-gallery-title">' . $nazov . '</h4>';
            echo '<p class="tm-gallery-description">' . $popis . '</p>';
            echo '<p class="tm-gallery-price">' . $cena . '</p>';
            echo '</figcaption>';
            echo '</figure>';
            echo '</article>';
        }
    }
}

function generateWorkers() {
    $db = new Workers();
    $workers = $db->getWorkers();
    echo '<div class="tm-container-inner tm-persons">';
    echo '<div class="row">';
    foreach ($workers as $worker) {
        echo'<article class="col-lg-6">';
        echo'<figure class="tm-person">';
        echo'<img src=' . $worker['url_fotografie'] .' alt="Image" class="img-fluid tm-person-img" />';
        echo'<figcaption class="tm-person-description">';
        echo'<h4 class="tm-person-name">'. $worker['meno'] . " " . $worker['priezvisko'] . '</h4>';
        echo'<p class="tm-person-title">'. $worker['pozicia'] . '</p>';
        echo'<p class="tm-person-about">'. $worker['popis'] . '</p>';
        echo'<div>';
        if (!empty($worker['facebook'])) {
            echo '<a href="' . $worker['facebook'] . '" class="tm-social-link" target="_blank">';
            echo '<i class="fab fa-facebook tm-social-icon"></i>';
            echo '</a>';
        }
        if (!empty($worker['twitter'])) {
            echo '<a href="' . $worker['twitter'] . '" class="tm-social-link" target="_blank">';
            echo '<i class="fab fa-twitter tm-social-icon"></i>';
            echo '</a>';
        }
        if (!empty($worker['instagram'])) {
            echo '<a href="' . $worker['instagram'] . '" class="tm-social-link" target="_blank">';
            echo '<i class="fab fa-instagram tm-social-icon"></i>';
            echo '</a>';
        }
        if (!empty($worker['youtube'])) {
            echo '<a href="' . $worker['youtube'] . '" class="tm-social-link" target="_blank">';
            echo '<i class="fab fa-youtube tm-social-icon"></i>';
            echo '</a>';
        }
        echo'</div>';
        echo'</figcaption>';
        echo'</figure>';
        echo'</article>';
    }
    echo '</div>';
    echo '</div>';
}

function generateQna() {
    $db = new QNA();
    $qna = $db->getQna();
    echo '<div class="tm-container-inner-2 tm-info-section">';
    echo '<div class="row">';
    echo '<div class="col-12 tm-faq">';
    echo '<h2 class="text-center tm-section-title">FAQs</h2>';
    echo '<p class="text-center">Here you can find answers to the most frequently asked questions from our customers.</p>';
    echo '<div class="tm-accordion">';
    foreach ($qna as $item) {
        echo '<button class="accordion">' . $item['otazka'] . '</button>';
        echo '<div class="panel">';
        echo '<p>' . $item['odpoved'] . '</p>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
function generateAbout() {
    $db = new About();
    $about = $db->getAbout();
    echo '<div class="tm-container-inner tm-features">';
    echo '<div class="row">';
    foreach ($about as $item) {
        echo '<div class="col-lg-4">';
        echo '<div class="tm-feature">';
        echo '<i class="fas fa-4x fa-' . $item["icon"] . ' tm-feature-icon"></i>';
        echo '<p class="tm-feature-description">' . $item["text"] . '</p>';
        echo '<a href="index.php" class="tm-btn tm-btn-' . $item["button"] . '">Read More</a>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}

function validateMenuType(string $type): bool {
    $menuTypes = [
        'header',
        'footer'
    ];
    if (in_array($type, $menuTypes)) {
        return true;
    } else {
        return false;
    }
}

function getMenuData(string $type): array {
    $menu = [];
    if (validateMenuType($type)) {
        if ($type == "header") {
            $menu = [
                'home' => [
                    'name' => 'Home',
                    'path' => 'index.php'
                ],
                'about' => [
                    'name' => 'About',
                    'path' => 'about.php'
                ],
                'contact' => [
                    'name' => 'Contact',
                    'path' => 'contact.php'
                ]
            ];
        }
    }
    return $menu;
}

function printMenu(array $menu) {
    foreach ($menu as $menuName => $menuData) {
       echo '<li class="tm-nav-li"><a href="' . $menuData['path'] . '" class="tm-nav-link">' . $menuData['name']. '</a></li>';
    }
}

?>