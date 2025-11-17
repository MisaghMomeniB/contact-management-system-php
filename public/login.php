<?php

session_start();
require_once __DIR__ . '/../controllers/UserController.php';

$controller = new UserController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $controller->loginUser();
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid username or password";
    }
}


include __DIR__ . '/../views/header.php';
include __DIR__ . '/../views/auth/login_form.php';
include __DIR__ . '/../views/footer.php';
