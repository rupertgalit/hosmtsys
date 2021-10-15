<?php
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Symptoms - HMS</title>
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
			<br>
			<br>
			<center>
				<form action="addsymptoms.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<input type="text" name="name" class="form" value="

				<?php
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con,"SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					$idd = $row['patient_id'];

					$sql1 = mysqli_query($con,"SELECT * FROM `assigned_patient` WHERE `patient_id`='$idd'");
					while ($roww = mysqli_fetch_array($sql1)) {
						echo $roww['fname']." ".$roww['sname'];
					}
				}
				 ?>" required="required"  disabled="disabled"><br><br>
				 <center><label for="symptoms"><b>Enter Sysmptoms</b></label></center><br>
				<textarea required="required" name="symptoms" id="symptoms" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea><br><br>

				<center><label for="test"><b>Enter Test Suggestions</b></label></center><br>
				<textarea required="required" name="test" id="test" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea><br><br>

				<input type="submit" value="Send To Lab" class="btnlink" name="btn"><br><br>
			</form>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($symptoms)) {
				require "../includes/doctor.php";
				addsymptoms();
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
