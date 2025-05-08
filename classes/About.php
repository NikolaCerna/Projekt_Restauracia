<?php
error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');

class About extends Database {
    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function insertAbout(string $icon, string $text, string $button): bool
    {
        $sql = "INSERT INTO informacie(icon, text, button) VALUES ('" . $icon . "', '" . $text ."', '" . $button ."')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getAbout(): array
    {
        $sql = "SELECT * FROM about";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalAbout = [];

        foreach ($data as $item) {
            $ID = $item['ID'];
            $icon = $item['icon'];
            $text = $item['text'];
            $button = $item['button'];
            $finalAbout[$ID] = [
                'ID' => $ID,
                'icon' => $icon,
                'text' => $text,
                'button' => $button
                            ];
        }
        return $finalAbout;
    }

    public function updateAbout(int $ID, string $icon = "", string $text = "", string $button = ""): bool
    {
        $sql = "UPDATE Informacie SET ";

        if (!empty($icon)) {
            $sql .= " icon = '" . $icon . "'";
        }
        if (!empty($text)) {
            $sql .= " text = '" . $text . "'";
        }
        if (!empty($button)) {
            $sql .= " button = '" . $button . "'";
        }
        $sql .= " WHERE ID = " . $ID;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }


}