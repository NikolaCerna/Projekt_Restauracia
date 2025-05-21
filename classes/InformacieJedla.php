<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', "On");
require_once(__ROOT__.'/classes/Database.php');

class InformacieJedla extends Database {
    protected $connection;

    public function __construct()
    {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function getInformacieJedla(): array
    {
        $sql = "SELECT * FROM informacie_jedla";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalInformacieJedla = [];

        foreach ($data as $item) {
            $ID = $item['ID'];
            $icon = $item['icon'];
            $text = $item['text'];
            $finalInformacieJedla[$ID] = [
                'ID' => $ID,
                'icon' => $icon,
                'text' => $text,
            ];
        }
        return $finalInformacieJedla;
    }

    public function updateInformacieJedla(int $ID, string $icon = "", string $text = ""): bool
    {
        $sql = "UPDATE informacie_jedla SET ";

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