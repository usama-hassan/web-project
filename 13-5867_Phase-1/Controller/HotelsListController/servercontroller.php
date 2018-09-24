<?php

header('Access-Control-Allow-Origin: *');
include("../../Model/HotelsListModel/servermodal.php");

$req = $_REQUEST['REQUEST_TYPE'];

if ($req == 'ALL_HOTELS_CITY')
{
		echo all_hotels_city();
}

function all_hotels_city()
{
	$city = $_REQUEST['CITY'];
	return Hotel::allHotelsCity($city);
}
?>