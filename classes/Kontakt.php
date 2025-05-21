<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');
class Kontakt extends Database {
    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function getSprava(string $meno, string $email, string $sprava): bool
    {
        $sql = "INSERT INTO kontakt (meno, email, sprava)
                VALUES (:meno, :email, :sprava)";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(array(':meno' => $meno, ':email' => $email, ':sprava' => $sprava));
            http_response_code(200);
            return $insert;
        } catch (\Exception $exception) {
            http_response_code(500);
            return false;
        }
    }
}