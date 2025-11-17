<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../controllers/ContactController.php';


$controller = new ContactController($pdo);
$contacts = $controller->getContacts($_SESSION['user_id']);


include __DIR__ . '/../views/header.php';
include __DIR__ . '/../views/contacts/list.php';
include __DIR__ . '/../views/footer.php';
