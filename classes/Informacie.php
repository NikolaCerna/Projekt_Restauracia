<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');

class Informacie extends Database {

    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }
    public function insertInfo(string $adresa, string $telefonne_cislo, string $email, string $facebook, string $twitter, string $instagram, string $youtube): bool
    {
        $sql = "INSERT INTO informacie(adresa, telefonne_cislo, email, facebook, twitter, instagram, youtube) VALUES ('" . $adresa . "', '" . $telefonne_cislo . "', '" . $email ."', '" . $facebook . "', '" . $twitter ."', '" . $instagram . "', '" . $youtube ."')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getInfo(): array
    {
        $sql = "SELECT * FROM informacie";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalInfo = [];

        foreach ($data as $item) {
            $ID = $item['ID'];
            $adresa = $item['adresa'];
            $telefonne_cislo = $item['telefonne_cislo'];
            $email = $item['email'];
            $facebook = $item['facebook'];
            $twitter = $item['twitter'];
            $instagram = $item['instagram'];
            $youtube = $item['youtube'];
            $finalInfo[$ID] = [
                'ID' => $ID,
                'adresa' => $adresa,
                'telefonne_cislo' => $telefonne_cislo,
                'email' => $email,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'instagram' => $instagram,
                'youtube' => $youtube
            ];
        }
        return $finalInfo;
    }

    public function updateInfo(int $ID, string $adresa = "", string $telefonne_cislo = "", string $email = "", string $facebook = "", string $twitter = "", string $instagram = "", string $youtube = ""): bool
    {
        $sql = "UPDATE Informacie SET ";

        if (!empty($adresa)) {
            $sql .= " adresa = '" . $adresa . "'";
        }
        if (!empty($telefonne_cislo)) {
            $sql .= " telefonne_cislo = '" . $telefonne_cislo . "'";
        }
        if (!empty($email)) {
            $sql .= " email = '" . $email . "'";
        }
        if (!empty($facebook)) {
            $sql .= " facebook = '" . $facebook . "'";
        }
        if (!empty($twitter)) {
            $sql .= " twitter = '" . $twitter . "'";
        }
        if (!empty($instagram)) {
            $sql .= " instagram = '" . $instagram . "'";
        }
        if (!empty($youtube)) {
            $sql .= " youtube = '" . $youtube . "'";
        }
        $sql .= " WHERE ID = " . $ID;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }
}