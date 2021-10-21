<?php
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor Dashboard - HMS</title>
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
		<div id="content" class="p-4 p-md-5 pt-5">
			<center>
			<br><br>
			<br><br>
			<h3>
				<?php
				require '../includes/connect.php';
				require '../includes/users.php';
				doctordetails();
				 ?>

			</h3><br><br>
		</center>
			<!-- In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>Add Symptoms to Patient</li><br>
				<li>View Patient Test Result</li><br>
				<li>Suggest Medicine</li><br>
			</ol> -->
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
</body>
</html>
