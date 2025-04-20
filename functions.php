<?php
function generateMenu($pagex) {
    $json = file_get_contents("data/datas.json");
    $data = json_decode($json, true);
    $text = $data["galeria"];
    $page = $text[$pagex];

    foreach ($page as $product) {
        echo '<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
        echo '<figure>';
        echo '<img src="' . $product["image"] . '" alt="' . ($product["title"]) . '" class="img-fluid tm-gallery-img" />';
        echo '<figcaption>';
        echo '<h4 class="tm-gallery-title">' . ($product["title"]) . '</h4>';
        echo '<p class="tm-gallery-description">' . ($product["description"]) . '</p>';
        echo '<p class="tm-gallery-price">' . ($product["price"]) . '</p>';
        echo '</figcaption>';
        echo '</figure>';
        echo '</article>';
    }
}

function generateAbout() {
    $json = file_get_contents("data/datas.json");
    $data = json_decode($json, true);
    $text = $data["about"];

    foreach ($text as $description) {
        echo '<div class="col-lg-4">';
        echo '<div class="tm-feature">';
        echo '<i class="fas fa-4x fa-' . $description["icon"] . ' tm-feature-icon"></i>';
        echo '<p class="tm-feature-description">' . $description["dsc"] . '</p>';
        echo '<a href="index.php" class="tm-btn tm-btn-' . $description["button"] . '">Read More</a>';
        echo '</div>';
        echo '</div>';
    }
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