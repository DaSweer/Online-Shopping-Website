<?php

//common functions & variables;

$privatekey = "shop";





function isLogged(){
	if(session_id() == '') {
		session_start();
	}
	
	if(!isset($_COOKIE["signup"]) || !isset($_SESSION["session"])){
		return false;
	}else{
		$username = $_COOKIE["signup"];
		$privatekey = $GLOBALS["privatekey"];
		
		if(md5($username.$privatekey) == $_SESSION["session"]){
			return true;
		}else{
			return false;
		}
	}
}


function getUserName(){
	if(session_id() == '') {
		session_start();
	}

	if(isLogged())
		return ($_COOKIE["signup"]);
	else
		return NULL;
}



function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>