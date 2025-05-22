<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');

class Obsah extends Database {
    private $connection;
    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function getValue($kluc) {
        $sql = "SELECT hodnota FROM obsah_stranky WHERE kluc = :kluc";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['kluc' => $kluc]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result['hodnota'] ?? null;
    }

    public function getID($kluc) {
        $sql = "SELECT ID FROM obsah_stranky WHERE kluc = :kluc";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['kluc' => $kluc]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result['ID'] ?? null;
    }

    public function updateObsah($ID, $hodnota) {
        $sql = "UPDATE obsah_stranky SET hodnota = :hodnota WHERE ID = :ID";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['hodnota' => $hodnota, 'ID' => $ID]);
            http_response_code(200);
            return $insert;
        } catch (Exception $exception) {
            http_response_code(500);
            return false;
        }
    }

}

