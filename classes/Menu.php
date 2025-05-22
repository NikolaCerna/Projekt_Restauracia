<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/Database.php');
class Menu extends Database {
    private $connection;
    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function validateMenuType($type) {
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

    public function getMenuData($type) {
        $menu = [];
        if ($this->validateMenuType($type)) {
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

    public function printMenu($menu) {
        foreach ($menu as $menuName => $menuData) {
            echo '<li class="tm-nav-li"><a href="' . $menuData['path'] . '" class="tm-nav-link">' . $menuData['name']. '</a></li>';
        }
    }

    public function printLoginRegister() {
        session_start();

        if (isset($_SESSION['login'])) {
            echo '<li class="tm-nav-li">
                <a href="#" class="tm-nav-link" style="cursor:default;">
                    Prihlásený: <strong>' . $_SESSION['login'] . '</strong> 
                </a>
              </li>';
            echo '<li class="tm-nav-li">
                <a href="db/logout.php" class="tm-nav-link">Log out</a>
              </li>';
        } else {
            echo '<li class="tm-nav-li">
                <a href="db/register.php" class="tm-nav-link">Sign up/ Siqn in</a>
              </li>';
        }
    }



}
?>