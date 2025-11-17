<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function registerUser()
    {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            return $this->userModel->register($_POST['username'], $_POST['password'], $_POST['email']);
        } else
            return false;
    }

    public function loginUser() 
    {
        if (!empty($_POST['username'] && $_POST['password'])) {
            return $this->userModel->login($_POST['username'], $_POST['password']);
        } else {
            false;  
        }
    }
}
