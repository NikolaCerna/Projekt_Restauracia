<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");

require_once(__ROOT__.'/classes/Database.php');

class JedalnyListok extends Database {
    protected $connection;
    public function __construct()
    {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function addJedlo(string $nazov, string $url_obrazka, string $popis, float $cena, int $id_kategoria): bool
    {
        $sql = "INSERT INTO jedalny_listok(nazov, url_obrazka, popis, cena, id_kategoria) VALUES (:nazov, :url_obrazka, :popis, :cena, :id_kategoria)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            'nazov' => $nazov,
            'url_obrazka' => $url_obrazka,
            'popis' => $popis,
            'cena' => $cena,
            'id_kategoria' => $id_kategoria
        ]);
    }

    public function getJedalnyListok(): array
    {
        $sql = "SELECT j.*, k.nazov AS kategoria_nazov 
                FROM jedalny_listok j 
                INNER JOIN kategorie k ON j.id_kategoria = k.ID";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        $finalJedalnyListok = [];

        foreach ($data as $item) {
            $ID = $item['ID'];
            $finalJedalnyListok[$ID] = [
                'ID' => $ID,
                'nazov' => $item['nazov'],
                'url_obrazka' => $item['url_obrazka'],
                'popis' => $item['popis'],
                'cena' => $item['cena'],
                'id_kategoria' => $item['id_kategoria'],
                'kategoria' => $item['kategoria_nazov']
            ];
        }

        return $finalJedalnyListok;
    }

    public function getKategorie(): array
    {
        $sql = "SELECT * FROM kategorie";
        $query = $this->connection->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteJedlo(int $ID): bool
    {
        $sql = "DELETE FROM jedalny_listok WHERE ID = :ID";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute(['ID' => $ID]);
    }

    public function updateJedlo(int $ID, string $nazov = "", string $url_obrazka = "", string $popis = "", float $cena = null, int $id_kategoria = 0): bool
    {
        $fields = [];
        $params = ['ID' => $ID];

        if (!empty($nazov)) {
            $fields[] = "nazov = :nazov";
            $params['nazov'] = $nazov;
        }

        if (!empty($url_obrazka)) {
            $fields[] = "url_obrazka = :url_obrazka";
            $params['url_obrazka'] = $url_obrazka;
        }

        if (!empty($popis)) {
            $fields[] = "popis = :popis";
            $params['popis'] = $popis;
        }

        if (!is_null($cena)) {
            $fields[] = "cena = :cena";
            $params['cena'] = $cena;
        }

        if (!empty($id_kategoria)) {
            $fields[] = "id_kategoria = :id_kategoria";
            $params['id_kategoria'] = $id_kategoria;
        }

        if (empty($fields)) return false;

        $sql = "UPDATE jedalny_listok SET " . implode(", ", $fields) . " WHERE ID = :ID";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($params);
    }
}
