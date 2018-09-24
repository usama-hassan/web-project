<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

class Hotel
{

    public static function seeComments($hotel_id)
    {
        $conn = connection::connectDatabase();
        $sql = $conn->prepare("SELECT id, name, subject, comment FROM comments WHERE hotel_id = ?");
        $sql->bind_param("i", $hotel_id);
        $sql->execute();
        $sql->bind_result($a, $b, $c, $d);

        if ($sql->execute())
        {
          $json["STATUS"] = "SUCCESS";

          $sql->bind_result($a1, $a2, $a3, $a4);
          $counter = 0;

          while($sql->fetch())
          {
            $temp["ID"] = $a1;
            $temp["NAME"] = $a2;
            $temp["SUBJECT"] = $a3;
            $temp["COMMENT"] = $a4;
            $json["DATA"][] = $temp;
            $counter++;
          }
          $json["count"] = $counter;
        }
        else
        {
          $json["STATUS"] = "FAIL";
        }
        $sql->close();
        mysqli_close($conn);
        return json_encode($json);
    }
}