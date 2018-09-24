<?php

header('Access-Control-Allow-Origin: *');
include("../../Model/SearchBtnModel/servermodal.php");

$req = $_REQUEST['REQUEST_TYPE'];

if ($req == 'SEARCH_FOR_HOTELS')
{
		echo search_for_hotels();
}

function search_for_hotels()
{
	$country = $_REQUEST['COUNTRY'];
	return Hotel::searchForHotels($country);
}
?>