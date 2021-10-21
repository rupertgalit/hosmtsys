<?php
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pharmacy Dashboard - HMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

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
	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->
</head>
<body>

	<?php
		include "includes/left.php";
	 ?>
		<div id="content" class="p-4 p-md-5 pt-5"  >
			<div style="padding-left:20px;padding-top:20px;">
				<center>
				<br><br>
				<br><br>
			 	<h3>
				<?php
				require '../includes/connect.php';
				require '../includes/users.php';
				pharmacydetails();
				 ?>
			</h3><br><br>
			<br><br>
			<!-- In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>View Suggested Medicine</li><br>
				<li>Add Medicine</li><br>
				<li>Edit Medicine</li><br>
				<li>Delete Medicine</li><br>
				<li>Add Medicine Price</li><br>
				<li>Search Medicine</li><br>
			</ol> -->
		</div>
		</div>

	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
