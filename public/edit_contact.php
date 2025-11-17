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


$contact = $controller->getContact($_GET['id'], $_SESSION['user_id']);


if (!$contact) {
    echo "<p>Contact not found</p>";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateContact($_GET['id'], $_SESSION['user_id']);
    header('Location: view_contact.php?id=' . $_GET['id']);
    exit;
}

setFlash('success', 'Contact updated successfully');


include __DIR__ . '/../views/header.php';
include __DIR__ . '/../views/contacts/edit_form.php';
include __DIR__ . '/../views/footer.php';
