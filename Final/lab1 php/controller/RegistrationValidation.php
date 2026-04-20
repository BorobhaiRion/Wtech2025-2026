<?php
session_start();

$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];

    if(isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }

    
    $isValid = true;

    if(!empty($name) && strlen($name) >= 5) {
        echo "User Name: ".$name."<br>";
    } else {
        echo "User-Name must be greater than 5 char<br>";
        $isValid = false;
    }

    if(!empty($email) && preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        echo "Email: ".$email."<br>";
    } else {
        echo "Invalid Email<br>";
        $isValid = false;
    }

    if(!empty($website) && preg_match("/^(https?:\/\/)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $website)) {
        echo "Website: ".$website."<br>";
    } else {
        echo "Invalid Website URL<br>";
        $isValid = false;
    }

    if(!empty($comment)) {
        echo "Comment: ".$comment."<br>";
    } else {
        echo "Comment cannot be empty<br>";
        $isValid = false;
    }

    if(isset($gender) && !empty($gender)) {
        echo "Gender: ".$gender."<br>";
    } else {
        echo "Please select a Gender<br>";
        $isValid = false;
    }

    if($isValid) {
        $_SESSION['name'] = $name;
        setcookie('name', $name, time()+200, '/');

        echo "<br>Welcome! {$name}<br>";
    } else {
        echo "<br>Reload the page!<br>";
    }
}


if(isset($_SESSION['name']) || isset($_COOKIE['name'])) {
    echo "Cookie and session set";
} else {
    echo "Re-submit the form";
}
?>