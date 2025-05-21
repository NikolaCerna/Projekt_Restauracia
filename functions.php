<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', __DIR__);
}

include_once "classes/JedalnyListok.php";
include_once "classes/Workers.php";
include_once "classes/Otazky.php";
include_once "classes/InformacieJedla.php";

function generateMenu($kategoria) {
    $db = new JedalnyListok();
    $jedalnyListok = $db->getJedalnyListok();
    foreach ($jedalnyListok as $item) {
        if ($item['kategoria'] == $kategoria) {
            $ID = $item['ID'];
            $nazov = $item['nazov'];
            $url_obrazka = $item['url_obrazka'];
            $popis = $item['popis'];
            $cena = $item['cena'];

            echo '<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
            echo '<figure>';
            echo '<div style="display: flex; align-items: center;">';
            echo '<button type="button" class="tm-btn tm-btn-warning" style="margin-right:22px" onclick="toggleEdit(\'menu\',' . $ID . ')">Upraviť</button>';
            echo '<form method="post" action="index.php" style="display: inline;">';
            echo '<button type="submit" name="delete" value="' . $ID . '" class="tm-btn tm-btn-danger">Zmazať</button>';
            echo '</form>';
            echo '</div>';
            echo '<img src="' . $url_obrazka . '" alt="' . $nazov . '" class="img-fluid tm-gallery-img" />';
            echo '<figcaption>';
            echo '<h4 class="tm-gallery-title">' . $nazov . '</h4>';
            echo '<p class="tm-gallery-description">' . $popis . '</p>';
            echo '<p class="tm-gallery-price">' . $cena . ' €</p>';
            echo '</figcaption>';
            echo '</figure>';


            echo '<div id="edit-form-menu-' . $ID . '" class="edit-form" style="display:none;">';
            echo '<form method="post" action="index.php">';
            echo '<input type="hidden" name="update" value="' . $ID . '">';
            echo '<div class="mb-2"><label>URL obrázka:</label><input type="text" name="url_obrazka" class="form-control" value="' . $url_obrazka . '"></div>';
            echo '<div class="mb-2"><label>Názov:</label><input type="text" name="nazov" class="form-control" value="' . $nazov . '"></div>';
            echo '<div class="mb-2"><label>Popis:</label><textarea name="popis" class="form-control">' . $popis . '</textarea></div>';
            echo '<div class="mb-2"><label>Cena:</label><input type="text" name="cena" class="form-control" value="' . $cena . '"></div>';
            echo '<div class="mb-2"><label>Kategoria:</label><select name="kategoria" class="form-control">';
                        echo '<option value="pizza">pizza</option>';
                        echo '<option value="salad">salad</option>';
                        echo '<option value="noodle">noodle</option>';
                    echo '</select>';
            echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
            echo '</form>';
            echo '</div>';

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
        $ID = $worker['ID'];
        $url_obrazka = $worker['url_fotografie'];
        $meno = $worker['meno'];
        $priezvisko = $worker['priezvisko'];
        $pozicia = $worker['pozicia'];
        $popis = $worker['popis'];
        $facebook = $worker['facebook'];
        $twitter = $worker['twitter'];
        $instagram = $worker['instagram'];
        $youtube = $worker['youtube'];
        echo'<article class="col-lg-6">';
        echo '<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'workers\',' . $ID . ')">Upraviť</button>';
        echo'<figure class="tm-person">';
        echo'<img src=' . $url_obrazka .' alt="Image" class="img-fluid tm-person-img" />';


        echo'<figcaption class="tm-person-description">';
        echo'<h4 class="tm-person-name">'. $meno . " " . $priezvisko . '</h4>';
        echo'<p class="tm-person-title">'. $pozicia . '</p>';
        echo'<p class="tm-person-about">'. $popis . '</p>';
        echo'<div>';
        if (!empty($worker['facebook'])) {
            echo '<a href="' . $facebook . '" class="tm-social-link" target="_blank">';
            echo '<i class="fab fa-facebook tm-social-icon"></i>';
            echo '</a>';
        }
        if (!empty($worker['twitter'])) {
            echo '<a href="' . $twitter . '" class="tm-social-link" target="_blank">';
            echo '<i class="fab fa-twitter tm-social-icon"></i>';
            echo '</a>';
        }
        if (!empty($worker['instagram'])) {
            echo '<a href="' . $instagram . '" class="tm-social-link" target="_blank">';
            echo '<i class="fab fa-instagram tm-social-icon"></i>';
            echo '</a>';
        }
        if (!empty($worker['youtube'])) {
            echo '<a href="' . $youtube . '" class="tm-social-link" target="_blank">';
            echo '<i class="fab fa-youtube tm-social-icon"></i>';
            echo '</a>';
        }

        echo'</div>';
        echo'</figcaption>';
        echo '<form method="post" action="about.php">';
        echo '<button type="submit" name="delete_worker" value="' . $ID . '" class="tm-btn tm-btn-danger">Zmazať</button>';
        echo '</form>';
        echo'</figure>';
        echo '<div id="edit-form-workers-' . $ID . '" class="edit-form" style="display:none;">';
        echo '<form method="post" action="about.php">';
        echo '<input type="hidden" name="update_workers" value="' . $ID . '">';
        echo '<div class="mb-2"><label>URL obrázka:</label><input type="text" name="url_fotografie" class="form-control" value="' . $url_obrazka . '"></div>';
        echo '<div class="mb-2"><label>Meno:</label><input type="text" name="meno" class="form-control" value="' . $meno . '"></div>';
        echo '<div class="mb-2"><label>Priezvisko:</label><input type="text" name="priezvisko" class="form-control" value="' . $priezvisko . '"></div>';
        echo '<div class="mb-2"><label>Pozícia:</label><input type="text" name="pozicia" class="form-control" value="' . $pozicia . '"></div>';
        echo '<div class="mb-2"><label>Popis:</label><textarea name="popis" class="form-control">' . $popis . '</textarea></div>';
        echo '<div class="mb-2"><label>Facebook:</label><input type="text" name="facebook" class="form-control" value="' . $facebook . '"></div>';
        echo '<div class="mb-2"><label>Twitter:</label><input type="text" name="twitter" class="form-control" value="' . $twitter . '"></div>';
        echo '<div class="mb-2"><label>Instagram:</label><input type="text" name="instagram" class="form-control" value="' . $instagram . '"></div>';
        echo '<div class="mb-2"><label>Youtube:</label><input type="text" name="youtube" class="form-control" value="' . $youtube . '"></div>';

        echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
        echo '</form>';
        echo '</div>';
        echo'</article>';

    }
    echo '</div>';
    echo '</div>';
}


function generateOtazky() {
    $db = new Otazky();
    $qna = $db->getOtazky();
    foreach ($qna as $item) {
        $ID = $item['ID'];
        $otazka = $item['otazka'];
        $odpoved = $item['odpoved'];

        echo '<button class="accordion">' . $otazka . '</button>';
        echo '<div class="panel">';
        echo '<p>' . $odpoved . '</p>';
        echo '</div>';

        echo '<div style="display: flex; gap: 10px; justify-content: center; margin-top: 10px;">';
        echo '<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'qna\',' . $ID . ')">Upraviť otázku</button>';
        echo '<form method="post" action="contact.php" style="margin: 0;">';
        echo '<button type="submit" name="delete_qna" value="' . $ID . '" class="tm-btn tm-btn-danger">Zmazať otázku</button>';
        echo '</form>';
        echo '</div>';

        echo '<div id="edit-form-qna-' . $ID . '" class="edit-form" style="display:none;">';
        echo '<form method="post" action="contact.php">';
        echo '<input type="hidden" name="update_qna" value="' . $ID . '">';

        echo '<div class="mb-2"><label>Otázka:</label><textarea name="otazka" class="form-control">' . $otazka . '</textarea></div>';
        echo '<div class="mb-2"><label>Odpoveď:</label><textarea name="odpoved" class="form-control">' . $odpoved . '</textarea></div>';


        echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
        echo '</form>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
function generateInformacieJedla() {
    $db = new InformacieJedla();
    $about = $db->getInformacieJedla();
    echo '<div class="tm-container-inner tm-features">';
    echo '<div class="row">';
    foreach ($about as $item) {
        $icon = $item['icon'];
        $text = $item['text'];
        $ID = $item['ID'];
        echo '<div class="col-lg-4">';
        echo '<div class="tm-feature">';
        echo '<i class="fas fa-4x fa-' . $icon . ' tm-feature-icon"></i>';
        echo '<p class="tm-feature-description">' . $text . '</p>';
        echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto" onclick="toggleEdit(\'about\',' . $ID . ')">Upraviť</button>';

        echo '<div id="edit-form-about-' . $ID . '" class="edit-form" style="display:none;">';
        echo '<form method="post" action="about.php">';
        echo '<input type="hidden" name="update_about" value="' . $ID . '">';
        echo '<div class="mb-2"><label>Icon:</label><input type="text" name="icon" class="form-control" value="' . $icon . '"></div>';
        echo '<div class="mb-2"><label>Text:</label><textarea name="text" class="form-control">' . $text . '</textarea></div>';
        echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
        echo '</form>';
        echo '</div>';


        echo '</div>';
        echo '</div>';
    }
    echo '<a href="index.php" class="tm-btn tm-btn-success" style="margin: auto;">Read More</a>';
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
                    'name' => 'InformacieJedla',
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
