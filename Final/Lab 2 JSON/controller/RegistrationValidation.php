<?php 
session_start();

$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";
$datafile ="../data.json";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];

    if(isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }

    // validation flag
    $isValid = true;

    if(!empty($name) && strlen($name)>=5){
        echo "User Name: $name<br>";
    } else {
        echo "User-Name must be greater than 5 char<br>";
        $isValid = false;
    }

    if(!empty($email) && preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
        echo "Email: $email<br>";
    } else {
        echo "Invalid Email<br>";
        $isValid = false;
    }

    if(!empty($website) && preg_match("/^(https?:\/\/)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $website)){
        echo "Website: $website<br>";
    } else {
        echo "Invalid Website URL<br>";
        $isValid = false;
    }

    if(!empty($comment)){
        echo "Comment: $comment<br>";
    } else {
        echo "Comment cannot be empty<br>";
        $isValid = false;
    }

    if(!empty($gender)){
        echo "Gender: $gender<br>";
    } else {
        echo "Please select a gender<br>";
        $isValid = false;
    }

    // ONLY if valid → save + session
    if($isValid){
        $_SESSION["name"] = $name;
        setcookie("name", $name, time()+3600, "/");

        echo "<br>Login Successful<br>";

        $formdata = array(
            "Name"=>$name,
            "Email"=>$email,
            "Website"=>$website,
            "Comment"=>$comment,
            "Gender"=>$gender
        );

        if(file_exists($datafile)){
            $existdata = file_get_contents($datafile);
            $tempdata = json_decode($existdata, true);
        } else {
            $tempdata = array();
        }

        if(!is_array($tempdata)){
            $tempdata = array();
        }

        $tempdata[] = $formdata;

        $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);

        if(file_put_contents($datafile, $jsondata)){
            echo "Data Saved<br>";
        } else {
            echo "Error saving data<br>";
        }
    } else {
        echo "<br>Please fix errors<br>";
    }
}

// session check
if(isset($_SESSION["name"]) || isset($_COOKIE["name"])){
    echo "<br>Welcome Back!";
} else {
    echo "<br>Please log in again!";
}
?>