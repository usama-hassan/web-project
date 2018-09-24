<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

class Hotel
{

    public static function addFbComment($name, $comment, $fb_user_id, $hotel_name)
    {
        $conn = connection::connectDatabase();
        $sql = $conn->prepare("INSERT INTO facebook_users(name, comment, user_id, hotel_name) VALUES(?, ?, ?, ?)");
        $sql->bind_param("ssis", $name, $comment, $fb_user_id, $hotel_name);

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