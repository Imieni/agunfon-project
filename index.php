<?php
session_start();

require_once "classes/users.php";
$user = new Users();

if (isset($_POST['mentee_submit'])) {
	$fname = trim(strip_tags(ucwords($_POST['fname'])));
	$email = trim(strip_tags(strtolower($_POST['email'])));
	$sex = trim($_POST['sex']);
	$mentor = trim($_POST['mentor']);
	$pwd = $_POST['pwd'];
	$country = trim(strip_tags(ucwords($_POST['country'])));
	$date_add = date(DATE_RFC822) ;

	$stmt = $user->runQuery("SELECT * FROM mentee_tbl WHERE email = :email");
	$stmt->execute(array("email" => $email));
	if ($stmt->rowCount() == 1) {
		$user->redirect("index.php?email-exists");
	}

	elseif($user->add_mentee($fname, $email, $sex, $mentor, $pwd, $country, $date_add)){
		 $user->redirect("mentee/login.php?success");
	}
}
elseif (isset($_POST['mentor_submit'])) {
	$fname = trim(strip_tags(ucwords($_POST['fname2'])));
	$email = trim(strip_tags(strtolower($_POST['email2'])));
	$sex = trim($_POST['sex2']);
	$pwd = $_POST['pwd2'];
	$mentor = trim($_POST['mentor']);
	$country = trim(strip_tags(ucwords($_POST['country'])));
	$phone = strip_tags($_POST['phone']);
	$date_add = date(DATE_RFC822) ;

	$stmt = $user->runQuery("SELECT * FROM mentor_tbl WHERE email = :email");
	$stmt->execute(array(":email"=>$email));
	if ($stmt->rowCount() == 1) {
		$user->redirect("index.php?email-exists");
	}

	elseif($user->add_mentor($fname, $email, $sex, $pwd, $mentor, $country, $phone, $date_add)){
		$user->redirect("mentor/login.php?success");
	}
}




include 'indexform.php';
?>