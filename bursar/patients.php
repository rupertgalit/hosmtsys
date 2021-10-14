<?php
session_start();
if (empty($_SESSION['bursar']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Patients - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<style type="text/css">
	a{
		text-decoration: none;
		color: #408080;
		}a:hover{
			text-decoration: underline;
		}
		</style>
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="addpatient.php" style="margin-left:10px;" style="float:left;"><button class="btnlink">Add Patient</button></a><form action="search.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Patient By ID"></form><br>
			<table class="table" style="width:98% !important;">
				<tr>
					<th>Patient ID</th>
					<th>Firstname</th>
					<th>Surname</th>
					<th>Sex</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Blood Type</th>
					<th>Birth Year</th>
					<th>Doctor Type</th>
					<th>STATUS</th>

				</tr>
				<?php
				require '../includes/bursar.php';
				patients2();
				 ?>
			</table>
		</div>
		<?php
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
