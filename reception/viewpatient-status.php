<?php
session_start();
if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Patients - HMS</title>
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
	 <div id="content" class="p-4 p-md-5 pt-5">
		<div class="right"><br>
			<!-- <a href="addpatient.php" style="margin-left:10px;" style="float:left;"><button class="btnlink">Add Patient</button></a><form action="search.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Patient By ID"></form><br> -->
			<Center><h1> PATIENT'S STATUS </h1></Center>
			<table class="table" style="width:80% !important;">
			<?php
				require '../includes/reception.php';
				viewpatients_status();
				 ?>
			</table><br><br>

				<!-- <a href="addpatient.php" style="margin-left:190px;" style="float:left;"><button class="btnlink">Patient Status</button></a><form action="search.php" method="get" style="float:right;margin-right:15px;">
				<a href="addpatient.php" style="margin-right:190px;" style="float:left;"><button class="btnlink">Bills Details</button></a><form action="search.php" method="get" style="float:right;margin-right:40px;"> -->

				<center>
					<div style="display: inline-block;">
					<form action="viewpatient-records.php?patient_id=<?php echo $id = $_GET['patient_id']; ?>" method="post">
					<input type="submit" name="btn" value="Patient Details" class="btnlink">
				</form>
				<?php
				extract($_POST);
				if (isset($btn)&&!empty($doctor)) {
					viewpatients_status();
				 }
				 ?>
				 <br><br>
			 </div>


				 <div style="display: inline-block;">
				 <form action="viewpatient-bills.php?patient_id=<?php echo $id = $_GET['patient_id']; ?>" method="post">
				 <input type="submit" name="btn" value="Bills Details" class="btnlink">
			 </form>
			 <?php
			 extract($_POST);
			 if (isset($btn)&&!empty($doctor)) {
				 viewpatients_bills();
				}
				?>
				<br><br>
			</div>
		</center>

				<center>
				<form >

				</form>

			</center>
		</div>
		<?php
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
