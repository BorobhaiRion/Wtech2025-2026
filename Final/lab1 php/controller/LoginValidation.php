<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = isset($_POST['Uname']) ? $_POST['Uname'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';

    if(!empty($name) && strlen($name) >= 5 && strlen($password) >= 4){

        $_SESSION['Uname'] = $name;
        setcookie('Uname', $name, time()+3600, "/"); // 1 hour

        echo "Login Successful<br>";
    }
    else{
        echo "Please Try Again!<br>";
    }
}

// Check login AFTER processing
if(isset($_SESSION['Uname']) || isset($_COOKIE['Uname'])){
    echo "Welcome back!";
}
else{
    echo "Please Log In Again";
}
?>