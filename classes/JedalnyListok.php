<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");

require_once(__ROOT__.'/classes/Database.php');


class JedalnyListok extends Database {

    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function addJedlo(string $nazov, string $url_obrazka, string $popis, float $cena, string $kategoria): bool
    {
        $sql = "INSERT INTO jedalny_listok(nazov, url_obrazka, popis, cena, kategoria) VALUES ('" . $nazov . "', '" . $url_obrazka . "', '" . $popis . "', '". $cena . "', '" . $kategoria . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getJedalnyListok(): array
    {
        $sql = "SELECT * FROM jedalny_listok";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalJedalnyListok = [];

        foreach ($data as $item) {
            $ID = $item['ID'];
            $nazov = $item['nazov'];
            $url_obrazka = $item['url_obrazka'];
            $popis = $item['popis'];
            $cena = $item['cena'];
            $kategoria = $item['kategoria'];
            $finalJedalnyListok[$ID] = [
                'ID' => $ID,
                'nazov' => $nazov,
                'url_obrazka' => $url_obrazka,
                'popis' => $popis,
                'cena' => $cena,
                'kategoria' => $kategoria
            ];
        }

        return $finalJedalnyListok;
    }

    public function deleteJedlo(int $ID): bool
    {
        $sql = "DELETE FROM jedalny_listok WHERE ID = " . $ID;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateJedlo(int $ID, string $nazov = "", string $url_obrazka = "", string $popis = "", float $cena = null, string $kategoria = ""): bool
    {
        $sql = "UPDATE jedalny_listok SET ";

        if (!empty($nazov)) {
            $sql .= " nazov = '" . $nazov . "'";
        }

        if (!empty($url_obrazka)) {
            $sql .= ", url_obrazka = '" . $url_obrazka . "'";
        }

        if (!empty($popis)) {
            $sql .= ", popis = '" . $popis . "'";
        }

        if (!empty($cena)) {
            $sql .= ", cena = '" . $cena . "'";
        }
        if (!empty($kategoria)) {
            $sql .= ", kategoria = '" . $kategoria . "'";
        }

        $sql .= " WHERE ID = " . $ID;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getCategories() {
        $sql = "SELECT DISTINCT kategoria FROM jedla";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $kategories = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $kategories;
    }
}