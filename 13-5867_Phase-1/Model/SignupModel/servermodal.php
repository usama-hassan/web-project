<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

class User
{

    public static function signUp($first_name, $last_name, $email, $password)
    {
        $conn = connection::connectDatabase();
        $sql = $conn->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES(?, ?, ?, ?)");
        $sql->bind_param("ssss", $first_name, $last_name, $email, $password);

        if ($sql->execute())
        {
            $json["STATUS"] = "SUCCESS";
            $json["MESSAGE"] = "Insertion Successful";
        }
        else
        {
        
            $json["STATUS"] = "FAIL";
            $json["MESSAGE"] = "Insertion Failed";
        }
        $sql->close();
        mysqli_close($conn); 
        return json_encode($json);
    }
}