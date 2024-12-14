<?php
require_once 'models/StudentsModel.php';

class StudentsController {
    private $model;

    public function __construct() {
        $this->model = new StudentsModel();
    }

    public function index() {
        $students = $this->model->getStudentsFromDB();
        require 'views/default.php';
    }

    public function addStudent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $group_id = $_POST['group_id'] ?? 0;

            if (!empty($name) && !empty($group_id)) {
                $this->model->addStudentToDB($name, (int)$group_id);
            }
        }
        header('Location: /students');
        exit();
    }

    public function actions() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
            $this->model->deleteStudentFromDB((int)$_POST['delete_id']);
        }
        header('Location: /students');
        exit();
    }
}
?>
