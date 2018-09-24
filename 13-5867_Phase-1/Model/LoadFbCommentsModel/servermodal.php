<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

class Hotel
{

    public static function seeFbComments($hotel_name)
    {
        $conn = connection::connectDatabase();
        $sql = $conn->prepare("SELECT * FROM facebook_users WHERE hotel_name= ?");
        $sql->bind_param("s", $hotel_name);
        $sql->execute();
        $sql->bind_result($a, $b, $c, $d, $e);

        if ($sql->execute())
        {
          $json["STATUS"] = "SUCCESS";

          $sql->bind_result($a1, $a2, $a3, $a4, $a5);
          $counter = 0;

          while($sql->fetch())
          {
            $temp["ID"] = $a1;
            $temp["NAME"] = $a2;
            $temp["COMMENT"] = $a3;
            $temp["USER_ID"] = $a4;
            $temp["HOTEL_NAME"] = $a5;
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