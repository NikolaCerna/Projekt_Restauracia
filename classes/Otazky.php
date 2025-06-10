<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/Database.php');

class Otazky extends Database {
    private $connection;
    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function getOtazky() {
        $sql = "SELECT * FROM otazky";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addOtazky(string $otazka, string $odpoved) {
        $sql = "INSERT INTO otazky(otazka, odpoved) VALUES (:otazka, :odpoved)";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['otazka' => $otazka, 'odpoved' => $odpoved]);
            http_response_code(200);
            return $insert;
        } catch (Exception $exception) {
            http_response_code(500);
            return false;
        }
    }

    public function deleteOtazky($ID) {
        if (!is_numeric($ID)) {
            echo 'ID otázky musí byť číslo.';
            exit;
        }
        $sql = "DELETE FROM otazky WHERE ID = ?";
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

    public function updateOtazky($ID, $otazka, $odpoved) {
        if (!is_numeric($ID)) {
            echo 'ID otázky musí byť číslo.';
            exit;
        }
        $sql = "UPDATE otazky SET otazka = :otazka, odpoved = :odpoved WHERE ID = :ID";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['otazka' => $otazka, 'odpoved' => $odpoved, 'ID' => $ID]);
            http_response_code(200);
            return $insert;
        } catch (Exception $exception) {
            http_response_code(500);
            return false;
        }
    }
}