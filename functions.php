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
?>