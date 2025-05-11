<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');
class Workers extends Database {
    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function addWorker(string $meno, string $priezvisko, string $pozicia, string $popis, string $facebook, string $twitter, string $instagram, string $youtube, string $url_fotografie): bool
    {
        $sql = "INSERT INTO zamestnanci(meno, priezvisko, pozicia, popis, facebook, twitter, instagram, youtube, url_fotografie) 
        VALUES ('" . $meno . "', '" . $priezvisko . "', '" . $pozicia . "', '". $popis . "', '" . $facebook . "', '". $twitter . "', '" . $instagram . "', '". $youtube . "', '" . $url_fotografie . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getWorkers(): array
    {
        $sql = "SELECT * FROM zamestnanci";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalWorkers = [];

        foreach ($data as $item) {
            $ID = $item['ID'];
            $meno = $item['meno'];
            $priezvisko = $item['priezvisko'];
            $pozicia = $item['pozicia'];
            $popis = $item['popis'];
            $facebook = $item['facebook'];
            $twitter = $item['twitter'];
            $instagram = $item['instagram'];
            $youtube = $item['youtube'];
            $url_fotografie = $item['url_fotografie'];
            $finalWorkers[$ID] = [
                'ID' => $ID,
                'meno' => $meno,
                'priezvisko' => $priezvisko,
                'pozicia' => $pozicia,
                'popis' => $popis,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'instagram' => $instagram,
                'youtube' => $youtube,
                'url_fotografie' => $url_fotografie
            ];
        }

        return $finalWorkers;
    }

    public function deleteWorker(int $ID): bool
    {
        $sql = "DELETE FROM zamestnanci WHERE ID = " . $ID;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateWorker(int $ID, string $meno = "", string $priezvisko = "", string $pozicia = "", string $popis = "", string $facebook = "",string $twitter = "",string $instagram = "",string $youtube = "",string $url_fotografie = ""): bool
    {
        $sql = "UPDATE zamestnanci SET ";

        if (!empty($meno)) {
            $sql .= " meno = '" . $meno . "'";
        }
        if (!empty($priezvisko)) {
            $sql .= ", priezvisko = '" . $priezvisko . "'";
        }
        if (!empty($pozicia)) {
            $sql .= ", pozicia = '" . $pozicia . "'";
        }
        if (!empty($popis)) {
            $sql .= ", popis = '" . $popis . "'";
        }
        if (!empty($facebook)) {
            $sql .= ", facebook = '" . $facebook . "'";
        }
        if (!empty($twitter)) {
            $sql .= ", twitter = '" . $twitter . "'";
        }
        if (!empty($instagram)) {
            $sql .= ", instagram = '" . $instagram . "'";
        }
        if (!empty($youtube)) {
            $sql .= ", youtube = '" . $youtube . "'";
        }
        if (!empty($url_fotografie)) {
            $sql .= ", url_fotografie = '" . $url_fotografie . "'";
        }

        $sql .= " WHERE ID = " . $ID;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

}