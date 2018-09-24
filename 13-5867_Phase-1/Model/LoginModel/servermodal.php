<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

class User
{

    public static function login($email, $password)
    {
        $conn = connection::connectDatabase();
        $sql = $conn->prepare("SELECT id, first_name FROM users WHERE email = ? AND password = ?");
        $sql->bind_param("ss", $email, $password);
        $sql->execute();
        $sql->bind_result($a, $b);

        if($sql->fetch())
        {
            $json["STATUS"] = "SUCCESS";
            $json["MESSEGE"] = "Login Successful";
            $json["ID"] = $a;
            $json["F_NAME"] = $b;
        }
        else
        {
            $json["STATUS"] = "FAIL";
            $json["MESSEGE"] = "User not found.";
        }
        $sql->close();
        mysqli_close($conn);
        return json_encode($json);
    }
}