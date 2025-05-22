<?php
include_once "classes/Menu.php";
$db = new Menu();
$menu = $db->getMenuData("header");
?>
<nav class="col-md-6 col-12 tm-nav">
    <ul class="tm-nav-ul">
        <?php
        $db->printMenu($menu);
        $db->printLoginRegister();
        ?>
    </ul>
</nav>
