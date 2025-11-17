<?php
// Connect to the database
require_once "../config/config.php";

// Initialize variables
$id = $name = $phone = $email = $address = "";
$errors = [];
$success = "";

// Check if ID is provided
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$id = (int) $_GET["id"];

// Fetch contact details
try {
    $sql = "SELECT * FROM contacts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $id]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        header("Location: index.php");
        exit();
    }

    $name = $contact["NAME"];
    $phone = $contact["phone"];
    //    $email = $contact['email'];
    $address = $contact["address"];
} catch (PDOException $e) {
    $errors[] = "Error fetching contact: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST["name"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    //    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST["address"] ?? "");

    // Validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // If no errors, update the contact
    if (empty($errors)) {
        try {
            $sql =
                "UPDATE contacts SET name = :name, phone = :phone, address = :address WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "phone" => $phone,
                "address" => $address,
                "id" => $id,
            ]);
            $success = "Contact updated successfully!";
            // Redirect to index.php after 2 seconds
            header("Refresh: 2; url=index.php");
        } catch (PDOException $e) {
            $errors[] = "Error updating contact: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Edit Contact</h2>

        <!-- Display success or error messages -->
        <?php if (!empty($success)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Contact form -->
        <form method="POST" action="edit.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars(
                    $name,
                ); ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="<?php echo htmlspecialchars($phone); ?>">
            </div>
            <!--        <div class="form-group">-->
            <!--            <label for="email">Email</label>-->
            <!--            <input type="email" class="form-control" id="email" name="email" value="-->
            <?php
//echo htmlspecialchars($email);
?><!--">-->
            <!--        </div>-->
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address"
                    rows="4"><?php echo htmlspecialchars(
                        $address,
                    ); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Contact</button>
            <a href="index.php" class="btn btn-secondary">Back to List</a>
        </form>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
