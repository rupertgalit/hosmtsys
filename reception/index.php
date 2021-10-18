<?php
session_start();
if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reception Dashboard - HMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->

	<style type="text/css">
	.total{
		height: 200px;
		width: 170px;
		border: 1px solid #408080;
		margin-top: 5px;
		margin-bottom: 5px;
		margin-left: 30%;
		text-align: center;
		padding-top: 20px;
	}

	#content{
		background-image : url('css/img/med_bg.jpg');
		background-repeat: no-repeat;
	  background-size: cover;
		color: rgb(0, 2, 45);
	}
	</style>
</head>
<body>



	<?php

		include "includes/left.php";
	 ?>

<div id="content" class="p-4 p-md-5 pt-5"  >
		 	<b>
				<?php
				require '../includes/connect.php';
				require '../includes/users.php';
				receptiondetails();
				 ?>
			</b><br><br>
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>Add Patients</li><br>
				<li>Edit Patients</li><br>
				<li>Delete Patients</li><br>
				<li>Search Patients</li><br>
			</ol>

			<div class="total">
				<b>Total Patients</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `assigned_patient`";
				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			 </div>
</div>
		<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
