<?php
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Medicine - HMS</title>
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
			<a href="medical.php" style="margin-left:10px;"><button class="btnlink">View Medicine</button></a><form action="searchmedicine.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Medicine By Name"></form><br><br>
			<center>
				<form action="addmedicine.php" method="POST">
				<input type="text" name="name" class="form" placeholder="Enter Medicine Name" required="required"><br><br>
				<input type="number" name="price" class="form" placeholder="Enter Medicine Price" required="required"><br><br>
				<input type="submit" value="Add" class="btnlink" name="btn">
			</form>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($name) && !empty($price)) {
				require "../includes/pharmacy.php";
				addmedicines();
			}
			 ?>
			</center>

		</div>
		<?php
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
