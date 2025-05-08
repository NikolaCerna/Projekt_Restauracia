<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');

class Obsah extends Database {
    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function getValue(string $kluc): ?string {
        $sql = "SELECT hodnota FROM obsah_stranky WHERE kluc = :kluc";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['kluc' => $kluc]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['hodnota'] ?? null;
    }
}

