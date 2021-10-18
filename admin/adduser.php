<?php
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add User - HMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<style type="text/css">
	a{
		text-decoration: none;
		color: #408080;
		}a:hover{
			text-decoration: underline;
		}
		#content{
			background-image : url('css/img/med_bg.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			color: rgb(1, 11, 232);
		}
		td,th{
			text-align: center;
		}

		</style>
	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->
</head>
<body>

	<?php

		include "includes/left.php";
	 ?>
		<div id="content" class="p-4 p-md-5 pt-5"><br>
			<a href="users.php" style="margin-left:10px;"><button class="btnlink">View Users</button></a><br>
			<center>
				<form action="adduser.php" method="POST">
				<input type="text" name="username" class="form" placeholder="Enter Username" required="required"><br><br>
				<select name="type" class="form" required="required">
					<option value="">Choose Type</option>
					<option>Admin</option>
					<option>Bursar</option>
					<option>NormalDoctor</option>
					<option>DentalDoctor</option>
					<option>WomenDoctor</option>
					<option>Reception</option>
					<option>Pharmacy</option>
					<option>Laboratory</option>
				</select><br><br>
				<input type="text" name="fname" class="form" placeholder="Enter Firstname" required="required"><br><br>
				<input type="text" name="sname" class="form" placeholder="Enter Surname" required="required"><br><br>
				<input type="password" name="password" class="form" placeholder="Enter Password" required="required"><br><br>
				<input type="submit" value="Add" class="btnlink" name="btn">
			</form>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($username) && !empty($password) &&!empty($type)) {
				require "../includes/admin.php";
				adduser();
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
