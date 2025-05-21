<?php
//konštanta DATABASE obsahujúca asociatívne pole... nieco ako slovniík kľúč - hodnota
define('DATABASE', [
    'HOST' => 'localhost', //Adresa databázového servera (v XAMPP je to vždy 'localhost')
    'DBNAME' => 'restauracia', //Názov mojej databázy (restauracia)
    'PORT' => 3306, //Port na pripojenie (štandardne 3306 pre MySQL/MariaDB)
    'USER_NAME' => 'root', //Meno používateľa databázy (v XAMPP väčšinou 'root')
    'PASSWORD' => '' //Heslo k databáze (v XAMPP väčšinou prázdne, preto je tam '')
]);