<?php 

    header("content-type: application/json");
    header("Access-control-Allow-Origin: *");

    include 'Database.php';
    include '../models/DbTestModel.php';

    $database = new Database();
    $db = $database->getConnection();

    $test = new DbTestModel($db);

    echo json_encode($test->checkConnection());