<?php

header('Access-Control-Allow-Origin: *');
include("../../Model/SignupModel/servermodal.php");

$req = $_REQUEST['REQUEST_TYPE'];

if ($req == 'SIGN_UP')
{
		echo sign_up();
}

function sign_up()
{
	$first_name = $_REQUEST['F_NAME'];
	$last_name = $_REQUEST['L_NAME'];
	$email = $_REQUEST['EMAIL'];
	$password = $_REQUEST['PASSWORD'];
	return User::signUp($first_name, $last_name, $email, $password);
}
?>