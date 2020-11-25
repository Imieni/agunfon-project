<?php include 'includes/header.php';?>
<body class="ment">
	<section class="set">
		<div class="dash">
			<h3>
				My Mentees List
			</h3>
		</div>
		<div>
			<table>
				<thead>
					<tr>
						<th>S/N</th>
						<th>Fullname</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Country</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					if ($stmt2->rowCount() == 0) {
						?>

						<tr><td>No available Mentee Yet</td></tr><?php
					}else{
						while ($row2 = $stmt2->fetch(PDO:: FETCH_ASSOC)) {
							
					?>
					<tr>
						<td><?php echo($i);?></td>
						<td><?php echo($row2['fullname']);?></td>
						<td><?php echo($row2['email']);?></td>
						<td><?php echo($row2['sex']);?></td>
						<td><?php echo($row2['country']);?></td>
					</tr>
				<?php $i++; } }?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>