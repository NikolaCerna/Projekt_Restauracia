<?php
if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__ . '/classes/Database.php');
class Users extends Database {
    private $rola;
    private $connection;
    public function __construct() {
        $this->rola = "pouzivatel";
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function register($login, $email, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "SELECT * FROM pouzivatelia WHERE (meno = ?) OR (email = ?) LIMIT 1";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$login, $email]);
            $existingUser = $statement->fetch();
            if ($existingUser) {
                return false; // Toto je kľúčová zmena!
            }

            $sql = "INSERT INTO pouzivatelia (meno, email, heslo, rola) VALUES (?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$login, $email, $hashedPassword, $this->rola]);

            return true; // všetko OK
        } catch (Exception $e) {
            return false; // ak niečo zlyhá
        }
    }


    public function login($email, $password) {
        $sql = "SELECT * FROM pouzivatelia WHERE email = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $email);
        $statement->execute();
        $user = $statement->fetch();
        if (!$user) {
            throw new Exception("Používateľ s daným e-mailom neexistuje.");
        }
        $storedPassword = $user['heslo'];
        if (!password_verify($password, $storedPassword)) {
            throw new Exception("Nesprávne heslo.");
        }
        session_start();
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['login'] = $user['meno'];
        $_SESSION['rola'] = $user['rola'];
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }

    public function isAdmin() {
        if (isset($_SESSION['rola']) && $_SESSION['rola'] === 'admin') {
            return true;
        } else {
            return false;
        }
    }
}