<?php
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Suggest Medicine - HMS</title>
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
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div id="content" class="p-4 p-md-5 pt-5">
			<br>
			<br>
			<center>
			<?php
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con,"SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					$idd = $row['patient_id'];

					$sql1 = mysqli_query($con,"SELECT * FROM `patient` WHERE `id`='$idd'");
					while ($roww = mysqli_fetch_array($sql1)) {
						echo "<h4 align='center'><u>".$roww['fname']." ".$roww['sname']."</u></h4>";
					}
				}
				 ?><br>
				 <h5><u>The Following Results</u></h5>
				 <?php
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con,"SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					echo "<b>".$idd = $row['test_results']."</b><br><br><br>";
				}

				 ?>
				<form action="medicine.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<input type="number" required="required" name="doctorsfee" class="form" placeholder="Doctors Fee"><br><br>
				 <center><label for="medicine">Enter Medicine</label></center>

				<textarea required="required" name="medicine" id="medicine" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea>
				<br><br>

				<input type="submit" value="Send To Pharmacy" class="btnlink" name="btn"><br><br>
			</form>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($medicine)) {
				require "../includes/doctor.php";
				addmedicine();
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
