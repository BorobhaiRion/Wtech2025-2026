<?php
session_start();
require_once 'config.php';
//for registration
if(isset($_POST['register'])){ //checking if register btn is pressed or not
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $check_Email = $conn ->query("SELECT email FROM users WHERE email = '$email'");
    if($check_Email->num_rows > 0){
        $_SESSION['register_error'] = 'Email is Already Registered !';
        $_SESSION['active-form'] = 'register';
    }
    else{
        $conn-> query("INSERT INTO users (name,email,password,role) VALUES('$name','$email','$password','$role')");
    }

    header("Location: index.php");
    exit();
}
if(isset($_POST['login'])){
     $email = $_POST['email'];
     $password = $_POST['password'];

     $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
     if($result->num_rows >0){
        $user = $result-> fetch_assoc();
        if(password_verify($password,$user['password'])){
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if($user['role']==='admin'){
                header("Location: admin_page.php");
            }
            else{
                header("Location: user_page.php");
            }
            exit();
        }
     }
     $_SESSION['login_error'] = 'Incorrect email or password';
     $_SESSION['active_form'] = 'Login';
     header("Location: index.php");
     exit();
}

?>