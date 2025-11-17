<?php
session_start();
require_once __DIR__ . '/../controllers/UserController.php';
$controller = new UserController($pdo);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ok = $controller->registerUser();
    if ($ok) {
        header('Location: login.php');
        exit;
    } else {
        $error = "Registration failed";
    }
}


include __DIR__ . '/../views/header.php';
?>
<div class="container mt-5" style="max-width: 500px;">
    <h3 class="text-center mb-4">Register</h3>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Register</button>
    </form>
</div>

<?php include __DIR__ . '/../views/footer.php'; ?>