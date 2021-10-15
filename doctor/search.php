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
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->
</head>
<body>

	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div id="content" class="p-4 p-md-5 pt-5"><br>
			<form action="search.php" method="get" style="float:left;margin-left:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Patient By ID"></form><br>
			<br><table class="table" style="width:98% !important;">
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Surname</th>
					<th>Gender</th>
					<th>Add symptoms</th>
				</tr>
				<?php
				require '../includes/doctor.php';
				searchpatients();
				 ?>
			</table>
		</div>
		<?php
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
