<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-box active">
            <h2>Welcome, <?= $_SESSION['name']; ?></h2>
            <p>Email: <?= $_SESSION['email']; ?></p>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>
</html>