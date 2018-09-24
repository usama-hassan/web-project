<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

class Hotel
{

    public static function searchForHotels($country)
    {
        $conn = connection::connectDatabase();
        $sql = $conn->prepare("SELECT id, name, price, rating, image FROM hotels WHERE country = ? ORDER BY rating DESC");
        $sql->bind_param("s", $country);
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
            $temp["PRICE"] = $a3;
            $temp["RATING"] = $a4;
            $temp["IMAGE"] = $a5;
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