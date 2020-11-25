<?php  
session_start();
	//require_once 'classes/session.php';
	require_once '../classes/users.php';

	$logout = new Users();

	if ($logout->is_loggedin()!= "")
	{
		$logout->redirect('index.php');
	}
	
	if (isset($_GET['logout']) && $_GET['logout'] == "true")
	{
		$logout->logout();
		$logout->redirect('login.php');
	}
?>