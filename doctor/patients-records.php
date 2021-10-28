<?php
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
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
	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->
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
</head>
<body>


	<?php

		include "includes/left.php";
	 ?>
	 		<div id="content" class="p-4 p-md-5 pt-5">
			<!-- <a href="addpatient.php" style="margin-left:10px;" style="float:left;"><button class="btnlink">Add Patient</button></a> -->
			<h3> Patient's Records </h3>
			<form action="searchpatient-records.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:35px; width:200px;padding-left:15px;" name="s" placeholder="Search Patient By Name"></form><br><br>
			<table class="table" style="width:98% !important;">
				<tr>
					<th>Patient ID</th>
					<th>Reference No</th>
					<th>Patient's Name</th>
					<th>Consultation Date</th>
					<th>Status</th>
					<th>Details</th>
				</tr>
				<?php
				require '../includes/doctor.php';
				patients_records_doc();
				 ?>
			</table>


	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
