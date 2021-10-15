<?php
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Users Admin Dashboard - HMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->
</head>
<body>

	<?php

		include "includes/left.php";
	 ?>
		<div id="content" class="p-4 p-md-5 pt-5"><br>
			<a href="adduser.php" style="margin-left:10px;"><button class="btnlink">Add User</button></a><br>
			<table class="table">
				<tr>
					<th>Username</th>
					<th>UserType</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
				require '../includes/admin.php';
				users();
				 ?>
			</table>
		</div>
		<?php
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
