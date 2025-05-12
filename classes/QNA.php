<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');

class QNA extends Database {
    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function insertQna(string $otazka, string $odpoved): bool
    {
        $sql = "INSERT INTO faq(otazka, odpoved) VALUES ('" . $otazka . "', '" . $odpoved . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getQna(): array
    {
        $sql = "SELECT * FROM faq";
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

    public function deleteQna(int $ID): bool
    {
        $sql = "DELETE FROM faq WHERE ID = " . $ID;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateQna(int $ID, string $otazka = "", string $odpoved = ""): bool
    {
        $sql = "UPDATE faq SET ";

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