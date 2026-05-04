<?php
session_start();
include "../Model/db.php";

if(!isset($_SESSION["name"])){
    echo "Please login first!";
    exit();
}

$username = $_SESSION["name"];

$database = new db();
$conn = $database->connection();

$result = $database->getUserData($conn, "user", $username);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
    <link rel="stylesheet" href="userPage.css">
</head>

<body>

<div class="container">

<div class="header">
    <h2>Welcome, <?php echo $username; ?></h2>
    <p>Your dashboard overview</p>
</div>

<h3>Your Data</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Website</th>
        <th>Comment</th>
        <th>Gender</th>
        <th>Created At</th>
    </tr>

    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["username"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["website"]."</td>";
            echo "<td>".$row["comment"]."</td>";
            echo "<td>".$row["gender"]."</td>";
            echo "<td>".$row["created_at"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }
    ?>

</table>

<a class="logout" href="../view/Login.php">Logout</a>

</div>

</body>
</html>