<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/Database.php');
class Spravy extends Database {
    private $connection;
    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function ulozitSpravu($meno, $email, $sprava) {
        $sql = "INSERT INTO spravy (meno, email, sprava) VALUES (:meno, :email, :sprava)";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['meno' => $meno, 'email' => $email, 'sprava' => $sprava]);
            header("Location: http://localhost/Projekt_Restauracia/thankyou.php");
            return $insert;
        } catch (\Exception $exception) {
            http_response_code(500);
            return false;
        }
    }

    public function getSpravy() {
        $sql = "SELECT * FROM spravy";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteSpravu($ID) {
        if (!is_numeric($ID)) {
            echo 'ID musí byť číslo.';
            exit;
        }
        $sql = "DELETE FROM spravy WHERE ID = ?";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute([$ID]);
            http_response_code(200);
            return $insert;
        } catch (Exception $exception) {
            http_response_code(500);
            return false;
        }
    }

    public function getLastSprava() {
        $sql = "SELECT meno, email, sprava FROM spravy ORDER BY ID DESC LIMIT 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}