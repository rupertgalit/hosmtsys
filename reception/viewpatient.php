<?php
session_start();
if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Patients - HMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<style type="text/css">
		#content{
			background-image : url('css/img/med_bg.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			color: rgb(1, 11, 232);
		}
		#table-center{
			display: flex;
			justify-content: center;
		}
		td,th,table{
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
			<a href="addpatient.php" style="margin-left:10px;" style="float:left;"><button class="btnlink">Add Patient</button></a>
			<div id="table-center">
			<table class="table" style="width:50% !important;">
			<?php
				require '../includes/reception.php';
				viewpatient();
				 ?>
			</table>
			<?php
			include "../includes/connect.php";
			$id = $_GET['id'];
			require '../includes/connect.php';

			$sql = "SELECT * FROM `patient` WHERE `id`='$id'";
			$query = mysqli_query($con,$sql);


			?>
			<br><br>
		</div>
			<center>
				<form action="viewpatient.php?id=<?php echo $id = $_GET['id']; ?>" method="post">
					<h5>Complain:</h5>
					<input type="text" name="complain" required="required" placeholder="Complain:"><br><br>
				<select name="doctor" class="form" required="required">
					<option value="">Choose Doctor</option>
					<option>NormalDoctor</option>

				</select><br><br>
				<input type="submit" name="btn" value="Request Doctor" class="btnlink" id="button">
			</form><br>
			<?php
			extract($_POST);
			if (isset($btn)&&!empty($doctor)) {

			 	assigntodoctor();
			 }
			 ?>
			 <br><br>
			</center>

		</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
