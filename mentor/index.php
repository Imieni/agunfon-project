<?php include 'includes/header.php';?>
<body class="ment">
	<section class="set">
		<div class="dash">
			<span>No of Mentees</span>
			<h3>
				<?php 
				echo($stmt2->rowCount());?>
			</h3>
		</div>
	</section>
</body>
</html>