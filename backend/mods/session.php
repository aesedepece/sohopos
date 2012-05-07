<?php

function login($db){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$userdata = mysql_query("SELECT id, username, name, surname FROM `sellers` WHERE `username` = '".$user."' AND `password` = PASSWORD( '".$pass."' )", $db);
	$userdata = mysql_fetch_assoc($userdata);
	if($userdata['id']){
		$_SESSION['uid'] = $userdata['id'];
		$_SESSION['me'] = $userdata;
	}
	echo json_encode($userdata);
}

function logout($db){
	$_SESSION['uid'] = NULL;
	session_destroy();
}
