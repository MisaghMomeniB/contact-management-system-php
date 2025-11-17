<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../controllers/ContactController.php';


$controller = new ContactController($pdo);


if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

setFlash('success', 'Contact deleted');


$controller->deleteContact($_GET['id'], $_SESSION['user_id']);


header('Location: index.php');
exit;
