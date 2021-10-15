<?php
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Search Patient - HMS</title>
	<meta charset="UTF-8">

	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->
</head>
<body>

	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div id="content" class="p-4 p-md-5 pt-5"><br>
			<form action="searchnew.php" method="get" style="float:left;margin-left:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Patient By ID"></form><br>
			<br><table class="table" style="width:98% !important;">
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Surname</th>
					<th>Gender</th>
					<th>View Results</th>
				</tr>
				<?php
				require '../includes/doctor.php';
				searchnewpatients();
				 ?>
			</table>
		</div>
		<?php
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
