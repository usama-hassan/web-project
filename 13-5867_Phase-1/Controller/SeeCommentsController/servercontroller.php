<?php

header('Access-Control-Allow-Origin: *');
include("../../Model/SeeCommentsModel/servermodal.php");

$req = $_REQUEST['REQUEST_TYPE'];

if ($req == 'SEE_COMMENTS')
{
		echo see_comments();
}

function see_comments()
{
	$hotel_id = $_REQUEST['HOTEL_ID'];
	return Hotel::seeComments($hotel_id);
}
?>