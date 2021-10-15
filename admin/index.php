<?php
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Dashboard - HMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->
	<style type="text/css">
	.total{
		height: 200px;
		width: 170px;
		border: 1px solid #408080;
		margin-top: 25px;
		margin-left: 40px;
		display: inline-block;
		float: left;
		text-align: center;
		padding-top: 20px;
	}
	</style>
</head>
<body>
	<
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div id="content" class="p-4 p-md-5 pt-5">
			<div class="total">
				<b>Total Receptionist</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Reception'";
				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			</div>

			<div class="total">
				<b>Total Doctors</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='NormalDoctor' OR `type`='DentalDoctor' OR `type`='WomenDoctor'";

				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			</div>

			<div class="total">
				<b>Total Laboratorist</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Laboratory'";
				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			</div>
			<div class="total">
				<b>Total Admins</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Admin'";

				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			</div>

			<div class="total">
				<b>Total Pharmatist</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Pharmacy'";
				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			</div>

			<div class="total">
				<b>Total Bursar</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Bursar'";
				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			</div>
		</div>
		<?php
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
