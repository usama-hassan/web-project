<?php

header('Access-Control-Allow-Origin: *');
include("../../Model/AddFbCommentModel/servermodal.php");

$req = $_REQUEST['REQUEST_TYPE'];

if ($req == 'ADD_FB_COMMENT')
{
		echo add_fb_comment();
}

function add_fb_comment()
{
	$name = $_REQUEST['NAME'];
	$comment = $_REQUEST['COMMENT'];
	$fb_user_id = $_REQUEST['FB_USER_ID'];
	$hotel_name = $_REQUEST['HOTEL_NAME'];
	return Hotel::addFbComment($name, $comment, $fb_user_id, $hotel_name);
}
?>