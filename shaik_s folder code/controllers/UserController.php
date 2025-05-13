<?php

class UserController {
    private $userModel;
    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }
    
}