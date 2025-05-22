<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/Database.php');
class Zamestnanci extends Database {
    private $connection;
    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function addWorker($meno, $priezvisko, $pozicia, $popis, $facebook, $twitter, $instagram, $youtube, $url_fotografie) {
        $sql = "INSERT INTO zamestnanci(meno, priezvisko, pozicia, popis, facebook, twitter, instagram, youtube, url_fotografie) 
        VALUES (:meno, :priezvisko, :pozicia, :popis, :facebook, :twitter, :instagram, :youtube, :url_fotografie)";
        $stmt = $this->connection->prepare($sql);
        try {
            $insert = $stmt->execute(['meno' => $meno, 'priezvisko' => $priezvisko, 'pozicia' => $pozicia, 'popis' => $popis, 'facebook' => $facebook,
                                        'twitter' => $twitter, 'instagram' => $instagram, 'youtube' => $youtube, 'url_fotografie' => $url_fotografie]);
            http_response_code(200);
            return $insert;
        } catch (PDOException $exception) {
            http_response_code(500);
            return false;
        }
    }

    public function getWorkers() {
        $sql = "SELECT * FROM zamestnanci";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteWorker($ID){
        if (!is_numeric($ID)) {
            echo 'ID otázky musí byť číslo.';
            exit;
        }
        $sql = "DELETE FROM zamestnanci WHERE ID = :ID";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['ID' => $ID]);
            http_response_code(200);
            return $insert;
        } catch (PDOException $exception) {
            http_response_code(500);
            return false;
        }
    }

    public function updateWorker($ID, $meno, $priezvisko, $pozicia, $popis, $facebook, $twitter, $instagram, $youtube, $url_fotografie) {
        $sql = "UPDATE zamestnanci SET meno = :meno, priezvisko = :priezvisko, pozicia = :pozicia, popis = :popis, facebook = :facebook, twitter = :twitter, 
                                        instagram = :instagram, youtube = :youtube, url_fotografie = :url_fotografie WHERE ID = :ID";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['meno' => $meno, 'priezvisko' => $priezvisko, 'pozicia' => $pozicia, 'popis' => $popis, 'facebook' => $facebook,
                                        'twitter' => $twitter, 'instagram' => $instagram, 'youtube' => $youtube,'url_fotografie' => $url_fotografie, 'ID' => $ID]);
            http_response_code(200);
            return $insert;
        } catch (PDOException $exception) {
            http_response_code(500);
            return false;
        }
    }
}