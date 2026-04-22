<?php 
//i have used a isvalid() func iam fully aware what it does and i have explained it in the comments .
session_start();

$name = "";
$password="";
$email = "";
$website = "";
$comment = "";
$gender = "";
$datafile ="../data.json";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];

    if(isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }

    // i will use a bool to see if all the fields are valid before creating the json
    $isValid = true;

    if(!empty($name) && strlen($name)>=5){

    } else {
        echo"Username is not valid<br>";
        $isValid = false;
    }
      if(!empty($password) && strlen($password)>=4){

    } else {
        echo"password Username is not valid <br>";
        $isValid = false;
    }
    if(!empty($email) && preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
        
    } else {
        echo"Email is not valid <br>";
        $isValid = false;
    }

    if(!empty($website) && preg_match("/^(https?:\/\/)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $website)){
        
    } else {
        echo"Website is not valid <br>";
        $isValid = false;
    }

    if(!empty($comment)){
        
    } else {
        echo"Comment is empty <br>";
        $isValid = false;
    }

    if(!empty($gender)){
       
    } else {
        echo"Gender is not selected <br>";
        $isValid = false;
    }

    
    if($isValid){ //--------------> here i have checked if valid
        $_SESSION["name"] = $name;
        setcookie("name", $name, time()+3600, "/");

        $formdata = array(
            "Name"=>$name,
            "password"=>$password,
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

        file_put_contents($datafile, $jsondata);

        header("Location: userPage.php");
        exit();
    }
    else{
        echo "Please try again!";
    }
}
?>