<?php

include '../config/Database.php';
include '../models/UserModel.php';
include '../controllers/UserController.php';

$db = (new Database())->getConnection();
$controller = new UserController($db);