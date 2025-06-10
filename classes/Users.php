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

    public function getAllUsers() {
        $sql = "SELECT ID, meno, email, rola FROM pouzivatelia";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllRoles() {
        $sql = "SELECT DISTINCT rola FROM roly";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function deleteUser($ID) {
        if (!is_numeric($ID)) return false;
        $sql = "DELETE FROM pouzivatelia WHERE ID = ?";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$ID]);
    }

    public function updateUserRole($ID, $rola) {
        if ($_SESSION['user_id'] == $ID) {
            $_SESSION['rola'] = $rola;
            header("Location: index.php");
        }
        $validRoles = $this->getAllRoles();
        if (!in_array($rola, $validRoles) || !is_numeric($ID)) return false;
        $sql = "UPDATE pouzivatelia SET rola = ? WHERE ID = ?";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$rola, $ID]);
    }

    public function getUsersByFilter($meno = '', $rola = '') {
        $sql = "SELECT * FROM pouzivatelia WHERE 1";
        $params = [];

        if ($meno !== '') {
            $sql .= " AND meno LIKE ?";
            $params[] = "%" . $meno . "%";
        }

        if ($rola !== '') {
            $sql .= " AND rola = ?";
            $params[] = $rola;
        }

        $statement = $this->connection->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function register($login, $email, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "SELECT * FROM pouzivatelia WHERE (meno = ?) OR (email = ?) LIMIT 1";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$login, $email]);
            $existingUser = $statement->fetch(PDO::FETCH_ASSOC);
            if ($existingUser) {
                return false;
            }
            $sql = "INSERT INTO pouzivatelia (meno, email, heslo, rola) VALUES (?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$login, $email, $hashedPassword, $this->rola]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM pouzivatelia WHERE email = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
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
        return (isset($_SESSION['rola']) && $_SESSION['rola'] === 'admin');
    }

    public function isKuchar() {
        return (isset($_SESSION['rola']) && $_SESSION['rola'] === 'kuchar');
    }

    public function isRecepcny() {
        return (isset($_SESSION['rola']) && $_SESSION['rola'] === 'recepcny');
    }

    public function isEditor() {
        return (isset($_SESSION['rola']) && $_SESSION['rola'] === 'editor');
    }
}