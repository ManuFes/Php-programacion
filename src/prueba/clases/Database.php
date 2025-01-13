<?php
class Database {
    private $db;

    public function __construct() {
        $this->db = new SQLite3(__DIR__ . '/../mibd.db'); // Ruta a la base de datos
    }

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, SQLITE3_TEXT);
        }
        return $stmt->execute();
    }

    public function close() {
        $this->db->close();
    }
}
?>
