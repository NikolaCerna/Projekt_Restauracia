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
            $finalAbout[$ID] = [
                'ID' => $ID,
                'icon' => $icon,
                'text' => $text,
                            ];
        }
        return $finalAbout;
    }

    public function updateAbout(int $ID, string $icon = "", string $text = ""): bool
    {
        $sql = "UPDATE about SET ";

        if (!empty($icon)) {
            $sql .= " icon = '" . $icon . "'";
        }
        if (!empty($text)) {
            $sql .= ", text = '" . $text . "'";
        }
        $sql .= " WHERE ID = " . $ID;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }


}