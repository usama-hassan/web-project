<?php

header('Access-Control-Allow-Origin: *');
include("../../Model/LoadFbCommentsModel/servermodal.php");

$req = $_REQUEST['REQUEST_TYPE'];

if ($req == 'LOAD_FB_COMMENTS')
{
		echo see_fb_comments();
}

function see_fb_comments()
{
	$hotel_name = $_REQUEST['HOTEL_NAME'];
	return Hotel::seeFbComments($hotel_name);
}
?>