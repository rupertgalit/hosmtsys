<?php
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pharmacy - HMS</title>
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
		<div id="content" class="p-4 p-md-5 pt-5">
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

				 <?php
				@require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con,"SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					echo "Give him/her the following Medicine: <br><b>".$row['medical']."</b>";

				}
				 ?><br><br>
				<form action="medicine.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<input type="number" required="required" name="price" class="form" placeholder="Enter Medicine Price"><br><br>


				<input type="submit" value="Finish" class="btnlink" name="btn"><br><br>
			</form>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($price)) {
				require "../includes/pharmacy.php";
				addmedicine();
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
