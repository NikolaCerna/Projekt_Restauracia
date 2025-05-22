<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__ . '/classes/Users.php');
$users = new Users();
$users->logout();
?>

