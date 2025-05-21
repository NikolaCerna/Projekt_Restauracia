<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');
class Kategorie extends Database {
    protected $connection;

    public function __construct()
    {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM kategorie";
        $query = $this->connection->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getIdByNazov(string $nazov): ?int
    {
        $sql = "SELECT ID FROM kategorie WHERE nazov = :nazov";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['nazov' => $nazov]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['ID'] ?? null;
    }
}
?>