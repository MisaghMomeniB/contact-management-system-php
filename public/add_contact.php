<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../controllers/ContactController.php';


$controller = new ContactController($pdo);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->createContact($_SESSION['user_id']);
    header('Location: index.php');
    exit;
}

setFlash('success', 'Contact created successfully');

include __DIR__ . '/../views/header.php';
include __DIR__ . '/../views/contacts/add_form.php';
include __DIR__ . '/../views/footer.php';
