<?php
class db{

    function connection(){
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "users";

        $connection = new mysqli($db_host,$db_user,$db_password,$db_name);

        if($connection->connect_error){
            die("Connection error: ".$connection->connect_error);
        }

        return $connection;
    }

    function signup($connection, $tablename, $username, $email, $website, $comment, $gender, $password){

        $sql = "INSERT INTO " . $tablename . " (username, email, website, comment, gender, password)
                VALUES ('" . $username . "', '" . $email . "', '" . $website . "', '" . $comment . "', '" . $gender . "', '" . $password . "')";

        $result = $connection->query($sql);
        return $result;
    }

    function signin($connection, $tablename, $username, $password)
    {
        $sql = "SELECT * FROM " . $tablename . " 
                WHERE username = '" . $username . "' 
                AND password = '" . $password . "'";

        $result = $connection->query($sql);
        return $result;
    }
    function getUserData($connection, $tablename, $username){

    $sql = "SELECT * FROM " . $tablename . " WHERE username = '" . $username . "'";
    $result = $connection->query($sql);

    return $result;
    }

}
?>

