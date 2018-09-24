<?php

header('Access-Control-Allow-Origin: *');
include("../../Model/AddCommentModel/servermodal.php");

$req = $_REQUEST['REQUEST_TYPE'];

if ($req == 'ADD_COMMENT')
{
		echo add_comment();
}

function add_comment()
{
	$hotel_id = $_REQUEST['HOTEL_ID'];
	$name = $_REQUEST['NAME'];
	$subject = $_REQUEST['SUBJECT'];
	$comment = $_REQUEST['COMMENT'];
	return Hotel::addComment($hotel_id, $name, $subject, $comment);
}
?>