<?php
include'common.php';

if(isLogged()){
	logout();
}else{
	header("Location: home.php");
}
function logout(){
	setcookie("user", "", time() - 3600, "/"); // 3600 = 1 hour
	//setcookie("session", "", time() - 3600, "/");
	$_SESSION['session'] = "";
	session_destroy();
	header("Location: home.php");
}
?>