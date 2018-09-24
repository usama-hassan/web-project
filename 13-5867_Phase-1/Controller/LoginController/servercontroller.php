<?php

header('Access-Control-Allow-Origin: *');
include("../../Model/LoginModel/servermodal.php");

$req = $_REQUEST['REQUEST_TYPE'];

if ($req == 'LOGIN')
{
		echo login_func();
}

function login_func()
{
	$email = $_REQUEST['EMAIL'];
	$password = $_REQUEST['PASSWORD'];
	return User::login($email, $password);
}
?>