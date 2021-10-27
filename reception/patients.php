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
			back
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
	 <div id="content" class="p-4 p-md-5 pt-5"><br>

		 	<center><h3> New Patient </h3></center>
			<a href="addpatient.php" style="margin-left:10px;" style="float:left;"><button class="btnlink">Add Patient</button></a>
			<form action="search.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:5px;" name="s" placeholder="Search Patient's Name"></form><br><br>
			<table class="table" style="width:98% !important;">
				<tr>
					<th>Id</th>
					<th>Firstname</th>
					<th>Surname</th>
					<th>Phone</th>
					<th>Sex</th>
					<th>View</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
				require '../includes/reception.php';
				patients();
				 ?>
			</table>


	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
