<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>La Tavola</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="css/templatemo-style.css" rel="stylesheet" />
</head>

<body>
<?php
    if (!defined('__ROOT__')) {
        define('__ROOT__', dirname(dirname(__FILE__)));
    }
    require_once (__ROOT__ . "/classes/Menu.php");
    $db = new Menu();
    $menu = $db->getMenuData("header");
?>
<div class="container">
    <header class="placeholder">
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/header/simple-house-01.jpg">
            <div class="tm-header">
                <div class="row tm-header-inner">
                    <div class="col-md-6 col-12">
                        <a href="<?php echo $menu[0]['path']; ?>">
                            <img src="img/header/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
                        </a>
                        <div class="tm-site-text-box">
                            <h1 class="tm-site-title">La Tavola</h1>
                            <h6 class="tm-site-description">Taste. Style. Comfort.</h6>
                        </div>
                    </div>
                    <?php include "parts/nav.php" ?>
                </div>
            </div>
        </div>
    </header>