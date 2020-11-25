<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP PAGE</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" /> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'Mentee')" id="defaultOpen">Mentee</button>
  		<button class="tablinks" onclick="openCity(event, 'Mentor')">Mentor</button>
	</div>
	<div class="tabcontent container" id="Mentee">
			<?php
				if (isset($_GET['email-exists'])) {
					echo("<div class='error'> Email already exists </div>");
				}

			?>
		<form method="POST">
			<div class=""></div>
			<label>Fullname</label>
			<input type="text" name="fname" required="" >
			<label>Email</label>
			<input type="email" name="email" required="" >
			<label>Sex</label>
			<select name="sex" required="">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
			<label>Select your kind of Mentor</label>
			<select name="mentor" required="">
				<option value="RM">Religious Mentor</option>
				<option value="PM">Political Mentor</option>
				<option value="EM">Educational Mentor</option>
				<option value="CM">Cultural Mentor</option>
			
			</select>
			<label>Country</label>
			<input type="text" name="country">
			
			<label>Password</label>
			<input type="password" name="pwd">
			<button type="submit" name="mentee_submit">Submit</button>
			<span>Registered already? <a href="mentee/login.php">Login</a></span>
		</form>
	</div>
	<div class="tabcontent container" id="Mentor">
		<form method="POST">
			<label>Fullname</label>
			<input type="text" name="fname2" >
			<label>Email</label>
			<input type="email" name="email2" >
			<label>Sex</label>
			<select name="sex2">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
			<label>Mentor Type</label>
			<select name="mentor" required="">
				<option value="RM">Religious Mentor</option>
				<option value="PM">Political Mentor</option>
				<option value="EM">Educational Mentor</option>
				<option value="CM">Cultural Mentor</option>
			
			</select>
			<label>Phone Number</label>
			<input type="text" name="phone">
			<label>Country</label>
			<input type="text" name="country">
			<label>Password</label>
			<input type="password" name="pwd2">
			<button type="submit" name="mentor_submit">Submit</button>
			<span>Registered already? <a href="mentor/login.php">Login</a></span>
		</form>
		</form>
	</div>
	<script type="text/javascript" src="js/web.js">	</script> 
</body>
</html>