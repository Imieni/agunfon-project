<?php
session_start();

require_once "../classes/users.php";
$mentor = new Users();
if ($mentor->is_loggedin2() == '') { 
      $mentor->redirect('login.php');
	}

	$stmt = $mentor->runQuery("SELECT * FROM mentor_tbl WHERE mentor_id = :mid");
	$stmt->execute(array(":mid" => $_SESSION['mentor_session']));
	$row = $stmt->fetch(PDO:: FETCH_ASSOC);

	$stmt2 = $mentor->runQuery("SELECT * FROM mentee_tbl WHERE mentor_kind = :mkind");
	$stmt2->execute(array(":mkind" => $row['mentor_kind']));

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>MENTOR DASHBOARD</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" /> 
</head>
<header>
	<div class="logo-set">
		<h1 class="logo">AGUNFON WEB APPLICATION</h1>

		<h3 class="titles">Hi, <?php echo($row['fullname']);?></h3>
	</div>
	<nav>
		<ul>
			<li><a href="index.php" class="active"> Dashboard</a></li>
			<li> <a href="view-mentees.php"> View my Mentees </a>
				
			</li>
			<li><a href="logout.php?logout=true">Logout</a></li>
		</ul>
	</nav>
</header>