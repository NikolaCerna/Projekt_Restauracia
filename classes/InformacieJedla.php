<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/Database.php');

class InformacieJedla extends Database {
    private $connection;
    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function getInformacieJedla() {
        $sql = "SELECT * FROM informacie_jedla";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateInformacieJedla($ID, $icon, $text) {
        if (!is_numeric($ID)) {
            echo 'ID musí byť číslo.';
            exit;
        }
        $sql = "UPDATE informacie_jedla SET icon = :icon, text = :text WHERE ID = :ID";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(['icon' => $icon, 'text' => $text, 'ID' => $ID]);
            http_response_code(200);
            return $insert;
        } catch (Exception $exception) {
            http_response_code(500);
            return false;
        }
    }
}