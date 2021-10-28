<?php
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor Dashboard - HMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style-clock.css">

	<style type="text/css">
	a{
		text-decoration: none;
		color: #408080;
		}a:hover{
			text-decoration: underline;
		}

		.total{
			height: 200px;
			width: 200px;
			border: 1px solid #2fe3e3;
			border-radius: 15px;
			margin: 5px;
			box-shadow: 0 0 40px #1094fa;

			text-align: center;
			padding-top: 20px;
		}
		.total1{
			display:inline-flex;
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
<body onload="initClock()">

	<?php
		include "includes/left.php";
	 ?>
		<div id="content" class="p-4 p-md-5 pt-5">
			<center>
			<br><br>
			<br><br>
			<h3>
				<?php
				require '../includes/connect.php';
				require '../includes/users.php';
				doctordetails();
				 ?>
			</h3><br><br>

			<div class="total1">
			<div class="total">
				<b>Patients From Reception</b><hr>
				<?php
				require_once "../includes/connect.php";
				$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND (`status`='recdoctor' or `status`='Consultation')";
				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			 </div>
			 <br>
			 <div class="total">
				<b>Patients From Laboratory</b><hr>
				<?php
				require_once "../includes/connect.php";
				$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='laboratory'";

				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			 </div>
			 <div class="total">
				<b>Total Patients</b><hr>
				<?php
				require_once "../includes/connect.php";
				$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='laboratory'";

				$query = mysqli_query($con,$sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>";
				 ?>
			 </div>
		 </div>
		 <br><br>

		 <div class="datetime">
		 <div class="date">
			 <span id="dayname">Day</span>,
			 <span id="month">Month</span>
			 <span id="daynum">00</span>,
			 <span id="year">Year</span>
		 </div>
		 <div class="time">
			 <span id="hour">00</span>:
			 <span id="minutes">00</span>:
			 <span id="seconds">00</span>
			 <span id="period">AM</span>
		 </div>
	 </div>

		</center>
		<script type="text/javascript">
 function updateClock() {
	 var now = new Date();
	 var dname = now.getDay(),
		 mo = now.getMonth(),
		 dnum = now.getDate(),
		 yr = now.getFullYear(),
		 hou = now.getHours(),
		 min = now.getMinutes(),
		 sec = now.getSeconds(),
		 pe = "AM";

	 if (hou >= 12) {
		 pe = "PM";
	 }
	 if (hou == 0) {
		 hou = 12;
	 }
	 if (hou > 12) {
		 hou = hou - 12;
	 }

	 Number.prototype.pad = function(digits) {
		 for (var n = this.toString(); n.length < digits; n = 0 + n);
		 return n;
	 }

	 var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
	 var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
	 var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
	 var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
	 for (var i = 0; i < ids.length; i++)
		 document.getElementById(ids[i]).firstChild.nodeValue = values[i];
 }

 function initClock() {
	 updateClock();
	 window.setInterval("updateClock()", 1);
 }
</script>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
</body>
</html>
