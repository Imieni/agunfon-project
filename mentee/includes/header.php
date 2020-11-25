<?php
session_start();

require_once "../classes/users.php";
$mentee = new Users();
if ($mentee->is_loggedin() == '') { 
      $mentee->redirect('login.php');
	}

	$stmt = $mentee->runQuery("SELECT * FROM mentee_tbl WHERE mentee_id = :mid");
	$stmt->execute(array(":mid" => $_SESSION['mentee_session']));
	$row = $stmt->fetch(PDO:: FETCH_ASSOC);

	$stmt2 = $mentee->runQuery("SELECT * FROM mentor_tbl WHERE mentor_kind = :mkind");
	$stmt2->execute(array(":mkind" => $row['mentor_kind']));
	//$row2 = $stmt2->fetch(PDO:: FETCH_ASSOC);
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>MENTEE DASHBOARD</title>
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
			<li> <a href="view-mentors.php"> View my Mentors </a>
				
			</li>
			<li><a href="logout.php?logout=true">Logout</a></li>
		</ul>
	</nav>
</header>