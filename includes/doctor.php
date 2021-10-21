<?php
function recdoctor()
{
	include "connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='recdoctor'";

	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		$sql2 = "SELECT * FROM `assigned_patient` WHERE `patient_id`='$ido'";
		$query2 = mysqli_query($con,$sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>".$row2['patient_id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='profile.php?patient_id=".$row['patient_id']."'>Add</a></center></td>";
			echo "</tr>";
		}

	}
}


function labdoctor()
{
	include "connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='labdoctor'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		$sql2 = "SELECT * FROM `assigned_patient` WHERE `patient_id`='$ido'";
		$query2 = mysqli_query($con,$sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['patient_id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='medicine.php?id=".$row['id']."'>view</a></center></td>";
			echo "</tr>";
		}

	}
}


function searchpatients()
{
			require 'connect.php';
			$fname = $_GET['s'];
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='recdoctor'";
			$query = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($query)) {
				$ido = $row['patient_id'];
				$sql2 = "SELECT * FROM `assigned_patient` WHERE `patient_id`='$ido' AND `patient_id` LIKE '%$fname%'";
				$query2 = mysqli_query($con,$sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['patient_id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='addsymptoms.php?id=".$row['id']."'>Add</a></center></td>";
			echo "</tr>";
		}

	}
}

function searchnewpatients()
{
			@require 'connect.php';
			$fname = $_GET['s'];
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='labdoctor'";
			$query = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($query)) {
				$ido = $row['patient_id'];
				$sql2 = "SELECT * FROM `assigned_patient` WHERE `patient_id`='$ido' AND `patient_id` LIKE '%$fname%'";
				$query2 = mysql_query($sql2);
		while ($row2 = mysql_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['patient_id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='medicine.php?id=".$row['id']."'>View</a></center></td>";
			echo "</tr>";
		}

	}
}

function addsymptoms()
{
	$symptoms = trim(htmlspecialchars($_POST['symptoms']));
	$test = trim(htmlspecialchars($_POST['test']));
	if (!empty($symptoms)) {
		$id = $_GET['id'];
		@require_once "connect.php";
		include "connect.php";

		$sql = "UPDATE `medication` SET `status`='laboratory',`symptoms`='$symptoms',`tests`='$test' WHERE `id`='$id'";
		$query = mysqli_query($con,$sql);
		if (!empty($query)) {
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			$doctor = $_SESSION['doctor'];
			$report = mysqli_query($con,"INSERT INTO `doctorreport` VALUES ('','$doctor','$id','$day','$month','$year')");
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Sent</b>";
		}
	}
}

function addmedicine()
{
	$medicine = trim(htmlspecialchars($_POST['medicine']));
	$doctorsfee = trim(htmlspecialchars($_POST['doctorsfee']));
	if (!empty($medicine)) {
		$id = $_GET['id'];
		@require_once "connect.php";
		include "connect.php";

		$sql = "UPDATE `medication` SET `status`='pharmacy',`medical`='$medicine', `doctor_price`='$doctorsfee' WHERE `id`='$id'";
		$query = mysqli_query($con,$sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Sent</b>";
		}
		else{
			echo mysqli_error();
		}
	}
	else{
		echo mysqli_error();
	}
}

function settings()
{
	//$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$password2 = trim(htmlspecialchars($_POST['password2']));
	$password = trim(htmlspecialchars($_POST['password']));
	if ($password != $password) {
		echo "<br><b style='color:red;font-size:14px;font-family:Arial;'>Password Must Match</b>";
	}
	else{
		$pass = sha1($password);
		$name = $_SESSION['doctor'];
		$type = $_SESSION['type'];

				$sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}
		}
	}
