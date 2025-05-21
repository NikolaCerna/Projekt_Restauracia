<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
if (!defined('__ROOT__')) {
    define('__ROOT__', __DIR__);
}
require_once(__ROOT__.'/classes/Database.php');
class Kontakt extends Database {
    private $connection;
    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function ulozitSpravu($meno, $email, $sprava) {
        $sql = "INSERT INTO kontakt (meno, email, sprava)
                VALUES (:meno, :email, :sprava)";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(array(':meno' => $meno, ':email' => $email, ':sprava' => $sprava));
            header("Location: http://localhost/Projekt_Restauracia/thankyou.php");
            return $insert;
        } catch (\Exception $exception) {
            http_response_code(500);
            return false;
        }
    }

    public function getSprava($meno, $email, $sprava) {
        $sql = "GET * FROM kontakt";
        $statement = $this->connection->prepare($sql);
    }
}