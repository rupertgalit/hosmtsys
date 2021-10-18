<?php
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add A Room - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">

</head>
<body>
	<div class="wrapper">
	<?php
		
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="rooms.php" style="margin-left:10px;"><button class="btnlink">View Rooms</button></a><br>
			<center>
				<form action="addroom.php" method="POST">
				<input type="number" name="number" class="form" placeholder="Enter Room Number" required="required"><br><br>
				<input type="text" name="name" class="form" placeholder="Enter Room Name" required="required"><br><br>
				<input type="submit" value="Add" class="btnlink" name="btn">
			</form>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($number) && !empty($name)) {
				require "../includes/admin.php";
				addroom();
			}
			 ?>
			</center>

		</div>

	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
