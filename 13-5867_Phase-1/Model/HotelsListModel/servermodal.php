<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

class Hotel
{

    public static function allHotelsCity($city)
    {
        $conn = connection::connectDatabase();
        $sql = $conn->prepare("SELECT * FROM hotels WHERE city = ? ORDER BY rating DESC");
        $sql->bind_param("s", $city);
        $sql->execute();
        $sql->bind_result($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k);
        if ($sql->execute())
        {
          $json["STATUS"] = "SUCCESS";

          $sql->bind_result($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11);
          $counter = 0;

          while($sql->fetch())
          {
            $temp["ID"] = $a1;
            $temp["NAME"] = $a2;
            $temp["PRICE"] = $a3;
            $temp["RATING"] = $a4;
            $temp["ADDRESS"] = $a5;
            $temp["IMAGE"] = $a6;
            $temp["CONTACT"] = $a7;
            $temp["CITY"] = $a8;
            $temp["COUNTRY"] = $a9;
            $temp["LOCATION_ID"] = $a10;
            $temp["API_CODE"] = $a11;
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