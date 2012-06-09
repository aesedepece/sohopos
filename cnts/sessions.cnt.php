<?php

class Sessions extends Cnt{

	function Sessions($app){
		session_start();
		parent::Cnt($app);
	}
	
	public function login(){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
	
		$userdata = mysql_query("SELECT id, username, name, surname FROM `sellers` WHERE `username` = '".$user."' AND `password` = PASSWORD( '".$pass."' )", $this->app->db);
		$userdata = mysql_fetch_assoc($userdata);
		if($userdata['id']){
			$_SESSION['uid'] = $userdata['id'];
			$_SESSION['me'] = $userdata;
		}
		echo json_encode($userdata);
	}

	public function logout(){
		$_SESSION['uid'] = NULL;
		session_destroy();
	}
	
}
