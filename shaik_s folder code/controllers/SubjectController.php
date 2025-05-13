<?php

class SubjectController {
    private $subjectModel;
    public function __construct($db) {
        $this->subjectModel = new SubjectModel($db);
    }
    public function getAllSubjects() {
        return $this->subjectModel->getAllSubjects();
    }
    public function createSubject($subject_name) {
        return $this->subjectModel->createSubject($subject_name);
    }
}