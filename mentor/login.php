<?php
session_start();
require_once '../classes/users.php';
$login = new Users();

if ($login->is_loggedin2() !='') { 
      $login->redirect('index.php');
	}

if (isset($_POST['login'])) {
	$email = trim(strip_tags(strtolower($_POST['email'])));
	$pwd = $_POST['pwd'];

	$stmt = $login->runQuery("SELECT * FROM mentor_tbl WHERE email = :email");
	$stmt->execute(array(":email" => $email));
	$row = $stmt->fetch(PDO:: FETCH_ASSOC);

	if ($login->login_mentor($email, $pwd)){
		$login->redirect('index.php?mentor-email='.$email);
	}
	else 
	{
		$login->redirect("login.php?incorrect");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOG IN</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" /> 
</head>
<body>
	<div class="container">
		<?php
				if (isset($_GET['success'])) {
					echo("<div class='success'> Sign up successful </div>");
				}
				elseif (isset($_GET['incorrect'])) {
					echo("<div class='error'>Incorrect Login Details </div>");
				}

			?>
		<form method="POST">
			<label>Email</label>
			<input type="email" name="email">
			<label>Password</label>
			<input type="password" name="pwd">
			<button type="submit" name="login"> Login</button>
			<span>Not yet registered? <a href="../index.php"> Sign Up</span>
		</form>
	</div>
</body>
</html>