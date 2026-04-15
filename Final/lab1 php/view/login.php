<?php
include "../controller/LoginValidation.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login page</title>
</head>
<body>

<form method="post">
    <table>
        <tr>
            <td><label for="Uname">Username:</label></td>
            <td><input type="text" id="Uname" name="Uname" required></td>
        </tr>
        <tr>
            <td><label for="pass">Password:</label></td>
            <td><input type="password" id="pass" name="pass" required></td>
        </tr>
        <tr>
            <td><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>

</body>
</html>