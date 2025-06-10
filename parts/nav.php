<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once (__ROOT__ . "/classes/Menu.php");
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
