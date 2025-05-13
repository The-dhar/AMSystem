<?php

class ClassController {
    private $classModel;
    public function __construct($db) {
        $this->classModel = new ClassModel($db);
    }
    public function getAllClasses() {
        return $this->classModel->getAllClasses();
    }
    public function createClass($class_name) {
        return $this->classModel->createClass($class_name);
    }
}