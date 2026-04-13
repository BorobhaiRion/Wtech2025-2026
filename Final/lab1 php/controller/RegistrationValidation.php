<?php 

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

    if(isset($_POST["gender"]))
    {
        $gender = $_POST["gender"];
    }


    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $website = $_REQUEST["website"];
    $comment = $_REQUEST["comment"];

    if(isset($_REQUEST["gender"]))
    {
        $gender = $_REQUEST["gender"];
    }



    if(!empty($name) && strlen($name)>=5)
    {
        echo "User Name: ".$name."<br>";
    }
    else
    {
        echo "User-Name must be greater than 5 char<br>";
    }

    if(!empty($email) && preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email))
    {
        echo "Email: ".$email."<br>";
    }
    else
    {
        echo "Invalid Email<br>";
    }

if(!empty($website) && preg_match("/^(https?:\/\/)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $website))
{
    echo "Website: ".$website."<br>";
}
else
{
    echo "Invalid Website URL<br>";
}

    if(!empty($comment))
    {
        echo "Comment: ".$comment."<br>";
    }
    else
    {
        echo "comment cannot be EEmpty<br>";
    }

    
    if(isset($gender) && !empty($gender))
    {
        echo "Gender: ".$gender."<br>";
    }
    else
    {
        echo "please select a Gender<br>";
    }
}

?>