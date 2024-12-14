<?php
require_once 'core/model.php';

class StudentsModel extends Model {
    public function getStudentsFromDB() {
        $stmt = $this->getDB()->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStudentToDB($name, $group_id) {
        $stmt = $this->getDB()->prepare("INSERT INTO students (name, group_id) VALUES (:name, :group_id)");
        $stmt->execute(['name' => $name, 'group_id' => $group_id]);
    }

    public function deleteStudentFromDB($id) {
        $stmt = $this->getDB()->prepare("DELETE FROM students WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
