<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

class Hotel
{

    public static function addComment($hotel_id, $name, $subject, $comment)
    {
        $conn = connection::connectDatabase();
        $sql = $conn->prepare("INSERT INTO comments(hotel_id, name, subject, comment) VALUES(?, ?, ?, ?)");
        $sql->bind_param("isss", $hotel_id, $name, $subject, $comment);

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