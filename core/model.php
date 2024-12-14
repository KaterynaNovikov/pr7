<?php
class Model {
    private $db;

    protected function getDB() {
        if ($this->db === null) {
            try {
                $this->db = new PDO(
                    'mysql:host=' . DBHOST . ';dbname=' . DBNAME,
                    DBUSER,
                    DBPASSWORD
                );
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->exec('SET NAMES utf8');
            } catch (PDOException $e) {
                die('Ошибка подключения к базе данных: ' . $e->getMessage());
            }
        }
        return $this->db;
    }
}
?>
