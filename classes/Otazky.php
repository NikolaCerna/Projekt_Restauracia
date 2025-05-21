<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');

class Otazky extends Database {
    protected $connection;

    public function __construct()
    {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function insertOtazky(string $otazka, string $odpoved): bool
    {
        $sql = "INSERT INTO otazky(otazka, odpoved) VALUES ('" . $otazka . "', '" . $odpoved . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getOtazky(): array
    {
        $sql = "SELECT * FROM otazky";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalQna = [];

        foreach ($data as $item) {
            $ID = $item['ID'];
            $otazka = $item['otazka'];
            $odpoved = $item['odpoved'];
            $finalQna[$ID] = [
                'ID' => $ID,
                'otazka' => $otazka,
                'odpoved' => $odpoved
            ];
        }
        return $finalQna;
    }

    public function deleteOtazky(int $ID): bool
    {
        $sql = "DELETE FROM otazky WHERE ID = " . $ID;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateOtazky(int $ID, string $otazka = "", string $odpoved = ""): bool
    {
        $sql = "UPDATE otazky SET ";

        if (!empty($otazka)) {
            $sql .= " otazka = '" . $otazka . "'";
        }

        if (!empty($odpoved)) {
            $sql .= ", odpoved = '" . $odpoved . "'";
        }

        $sql .= " WHERE ID = " . $ID;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }



}