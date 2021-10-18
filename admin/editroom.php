<?php
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Room - HMS</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">

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
		<div id="content" class="p-4 p-md-5 pt-5"><br>
			<a href="rooms.php" style="margin-left:10px;"><button class="btnlink">View Rooms</button></a><br>
			<?php

			$id = $_GET['id'];

			?>
			<center>
				<form action="editroom.php?id=<?php echo $id; ?>" method="POST">
				<input type="text" name="number" class="form" value="<?php echo $id; ?>" required="required" disabled="disabled"><br><br>


				<?php
				require_once '../includes/connect.php';
				$sql = "SELECT * FROM `rooms` WHERE `room_no`='$id'";
				$query = mysql_query($sql);
				while ($row = mysql_fetch_array($query)) {
					?>
					<input type="text" name="name" class="form" value="<?php echo $row['room_name']; ?>" required="required"><br><br>
					<?php
				}
				 ?>
				<input type="submit" value="Update" class="btnlink" name="btn">
			</form>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($name)) {
				require "../includes/admin.php";
				updateroom();
			}
			 ?>
			</center>

		</div>

	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
