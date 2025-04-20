<?php
include_once "functions.php";
$menu = getMenuData("header")
?>
<nav class="col-md-6 col-12 tm-nav">
    <ul class="tm-nav-ul">
        <?php printMenu($menu); ?>
    </ul>
</nav>