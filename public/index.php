<?php
// Connect to the database
require_once "../config/config.php";

// Fetch all contacts
$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
            min-height: 100vh;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        h2 {
            font-weight: bold;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .btn-primary {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #2575fc, #6a11cb);
        }

        .table {
            font-size: 14px;
        }

        .table thead {
            background: linear-gradient(45deg, #232526, #414345);
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
            transform: scale(1.01);
            transition: 0.2s;
        }

        .btn-sm {
            font-size: 12px;
            padding: 4px 10px;
        }

        .btn-warning {
            background: #ffb347;
            border: none;
        }

        .btn-warning:hover {
            background: #ff9800;
        }

        .btn-danger {
            background: #ff5f6d;
            border: none;
        }

        .btn-danger:hover {
            background: #e53935;
        }

        .alert {
            border-radius: 10px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">📇 Contact Management System</h2>

        <div class="card p-4">
            <a href="add.php" class="btn btn-primary mb-3">+ Add New Contact</a>

            <?php if (count($contacts) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contacts as $contact): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars(
                                        $contact["NAME"],
                                    ); ?></td>
                                    <td><?php echo htmlspecialchars(
                                        $contact["phone"],
                                    ); ?></td>
                                    <td><?php echo htmlspecialchars(
                                        $contact["address"],
                                    ); ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?php echo $contact[
                                            "id"
                                        ]; ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                                        <a href="delete.php?id=<?php echo $contact[
                                            "id"
                                        ]; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this contact?');">🗑️ Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center" role="alert">
                    No contacts found in the system.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
