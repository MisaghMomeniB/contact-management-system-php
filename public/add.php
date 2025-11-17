<?php
// Connect to the database
require_once "../config/config.php";

// Initialize variables
$name = $phone = $address = $email = "";
$errors = [];
$success = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST["name"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $email = trim($_POST["email"] ?? "");

    // Validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    //    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //        $errors[] = 'Invalid email format.';
    //    }

    // If no errors, insert into database
    if (empty($errors)) {
        try {
            $sql =
                "INSERT INTO contacts (name, phone, email, address) VALUES (:name, :phone, :email, :address)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "phone" => $phone,
                "email" => $email,
                "address" => $address,
            ]);
            $success = "Contact added successfully!";
            // Clear form fields after successful submission
            $name = $phone = $email = $address = "";
            // Redirect to index.php after 2 seconds
            header("Refresh: 2; url=index.php");
        } catch (PDOException $e) {
            $errors[] = "Error adding contact: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contact</title>
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
        <h2 class="text-center mb-4">Add New Contact</h2>

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
        <form method="POST" action="add.php">
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
            <!--            <input type="email" class="form-control" id="email" name="email"-->
            <!--                   value="--><?php
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
            <button type="submit" class="btn btn-primary">Add Contact</button>
            <a href="index.php" class="btn btn-secondary">Back to List</a>
        </form>
    </div>

</body>

</html>
