<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");

require_once(__ROOT__.'/classes/Database.php');

class JedalnyListok extends Database {
    private $connection;
    public function __construct()
    {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function addJedlo($nazov, $url_obrazka, $popis, $cena, $id_kategoria) {
        $sql = "INSERT INTO jedalny_listok(nazov, url_obrazka, popis, cena, id_kategoria) VALUES (:nazov, :url_obrazka, :popis, :cena, :id_kategoria)";
        $statement= $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['nazov' => $nazov,'url_obrazka' => $url_obrazka, 'popis' => $popis, 'cena' => $cena, 'id_kategoria' => $id_kategoria]);
            http_response_code(200);
            return $insert;
        } catch (Exception $exception) {
            http_response_code(500);
            return false;
        }
    }

    public function getJedalnyListok() {
        $sql = "SELECT j.*, k.nazov AS kategoria_nazov FROM jedalny_listok j INNER JOIN kategorie k ON j.id_kategoria = k.ID";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteJedlo(int $ID) {
        if (!is_numeric($ID)) {
            echo 'ID otázky musí byť číslo.';
            exit;
        }
        $sql = "DELETE FROM jedalny_listok WHERE ID = :ID";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['ID' => $ID]);
            http_response_code(200);
            return $insert;
        } catch (Exception $exception) {
            http_response_code(500);
            return false;
        }
    }

    public function updateJedlo($ID, $nazov, $url_obrazka, $popis, $cena, $id_kategoria) {
        if (!is_numeric($ID)) {
            echo 'ID otázky musí byť číslo.';
            exit;
        }
        $sql = "UPDATE jedalny_listok SET nazov = :nazov, url_obrazka = :url_obrazka, popis = :popis, cena = :cena, id_kategoria = :id_kategoria WHERE ID = :ID";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['nazov' => $nazov, 'url_obrazka' => $url_obrazka, 'popis' => $popis, 'cena' => $cena, 'id_kategoria' => $id_kategoria, 'ID' => $ID]);
            http_response_code(200);
            return $insert;
        } catch (Exception $exception) {
            http_response_code(500);
            return false;
        }
    }
}
