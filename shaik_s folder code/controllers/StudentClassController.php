<?php

class StudentClassController {
    private $model;
    public function __construct($db) {
        $this->model = new StudentClassModel($db);
    }
    public function getAllStudentClass() {
        return $this->model->getAllStudentClass();
    }
    public function assignStudentClass($student_id, $class_id) {
        return $this->model->assignStudentClass($student_id, $class_id);
    }
}