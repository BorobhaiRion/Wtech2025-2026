
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
    <label>Username:</label><br>
    <input type="text" name="username"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="Log In">
    </form>

    <form action="index.php" method="post">
    <label>Enter a Country name:</label><br>
    <input type="text" name="country"><br>
    <input type="submit" value="Done">
    
    </form>
</body>
</html>
<?php
//get  and post
    echo "{$_POST["username"]} <br>";
    echo "{$_POST["password"]} <br>";

    //associative array hash map

    $capitals = array("Bangladesh" =>"Dhaka",
                        "Iran" =>"Tehran",
                            "USA" =>"New York",
                                "India" =>"Idk");
   $capital = $capitals[$_POST["country"]];
    echo"The CAPITAL is {$capital} "
?>