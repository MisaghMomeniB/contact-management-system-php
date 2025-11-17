<?php

session_start();
if (empty($_SESSION['user_id'])) {
header('Location: login.php');
exit;
}


require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../controllers/ContactController.php';


if (!isset($_GET['id'])) {
header('Location: index.php');
exit;
}


$controller = new ContactController($pdo);
$contact = $controller->getContact($_GET['id'], $_SESSION['user_id']);


if (!$contact) {
echo "<p>Contact not found</p>";
exit;
}


include __DIR__ . '/../views/header.php';
include __DIR__ . '/../views/contacts/view.php';
include __DIR__ . '/../views/footer.php';