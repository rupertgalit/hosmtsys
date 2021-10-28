<?php
function recdoctor()
{
	include "connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND (`status`='recdoctor' or `status`='Consultation')";

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
			echo "<td><center><a href='profile.php?id=".$row['id']."'>View</a></center></td>";
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
			echo "<td><center><a href='profile.php?id=".$row['id']."'>view</a></center></td>";
			echo "</tr>";
		}

	}
}


function searchpatients()
{
			require 'connect.php';
			$fname = $_GET['s'];
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND (`status`='recdoctor' or `status`='Consultation')";
			$query = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($query)) {
				$ido = $row['patient_id'];
				$sql2 = "SELECT * FROM `assigned_patient` WHERE `patient_id`='$ido' AND (`fname` LIKE '%$fname%' or `sname` LIKE '%$fname%')";
				$query2 = mysqli_query($con,$sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['patient_id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='profile.php?id=".$row['id']."'>View</a></center></td>";
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

function patients_records_doc()
{
	require 'connect.php';

	$sql = "SELECT *  from assigned_patient Inner JOIN medication on  assigned_patient.patient_id = medication.patient_id  ORDER BY medication.patient_id, medication.month DESC,medication.date DESC,medication.year DESC  ";
	// $sql = "SELECT * FROM `assigned_patient`";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {


		echo "<tr height=30px'>";
		echo "<td>P-".$row['patient_id']."</td>";
		echo "<td>".$row['reference_no']."</td>";
		echo "<td>".$row['fname']." ".$row['sname']."</td>";
		echo "<td>".$row['month']."-".$row['date']."-".$row['year'];
		echo "<td>".$row['status']."</td>";
		echo "<td><center><a href='profile-rec.php?reference_no=".$row['reference_no']."'>View</a></center></td>";
		echo "</tr>";
	}
}

function searchpatients_records_doc()
{
	require 'connect.php';
	$sachi = $_GET['s'];
	$sql = "SELECT *  from assigned_patient Inner JOIN medication on  assigned_patient.patient_id = medication.patient_id
	WHERE `fname` LIKE '%$sachi%' or `sname` LIKE '%$sachi%' ORDER BY medication.patient_id, medication.month DESC,medication.date DESC,medication.year DESC  ";
	// $sql = "SELECT * FROM `assigned_patient`";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {


		echo "<tr height=30px'>";
		echo "<td>P-".$row['patient_id']."</td>";
		echo "<td>".$row['reference_no']."</td>";
		echo "<td>".$row['fname']." ".$row['sname']."</td>";
		echo "<td>".$row['month']."-".$row['date']."-".$row['year'];
		echo "<td>".$row['status']."</td>";
		echo "<td><center><a href='profile-rec.php?reference_no=".$row['reference_no']."'>View</a></center></td>";
		echo "</tr>";
	}
}

function addtest()
{

	$test = trim(htmlspecialchars($_POST['test']));
	if (!empty($test)) {
		$id = $_GET['id'];
		@require_once "connect.php";
		include "connect.php";

		$sql = "UPDATE `medication` SET `status`='laboratory',`tests`='$test' WHERE `id`='$id'";
		$query = mysqli_query($con,$sql);
		if (!empty($query)) {
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			echo '<script>alert("Successfully Add")</script>';
			if (!empty($_SESSION)) {
			$doctor = $_SESSION['doctor'];
			$report = mysqli_query($con,"INSERT INTO `doctorreport` VALUES ('','$doctor','$id','$day','$month','$year')");
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Sent</b>";
			}
		}
	}
}
function addfindings()
{
	$findings = trim(htmlspecialchars($_POST['findings']));
	if (!empty($findings)) {
		$id = $_GET['id'];
		@require_once "connect.php";
		include "connect.php";

		$sql = "UPDATE `medication` SET `status`='Consultation',`findings`='$findings' WHERE `id`='$id'";
		$query = mysqli_query($con,$sql);

		if (!empty($query)) {
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			echo '<script>alert("Successfully Add")</script>';
			if (!empty($_SESSION)) {
			$doctor = $_SESSION['doctor'];
				// code...

			$report = mysqli_query($con,"INSERT INTO `doctorreport` VALUES ('','$doctor','$id','$day','$month','$year')");
			}
		}
	}
}

function addtreatment()
{
	$treatment = trim(htmlspecialchars($_POST['treatment']));
	if (!empty($treatment)) {
		$id = $_GET['id'];
		@require_once "connect.php";
		include "connect.php";

		$sql = "UPDATE `medication` SET `status`='Consultation',`treatment`='$treatment' WHERE `id`='$id'";
		$query = mysqli_query($con,$sql);

		if (!empty($query)) {
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			echo '<script>alert("Successfully Add")</script>';
			if (!empty($_SESSION)) {
			$doctor = $_SESSION['doctor'];
				// code...

			$report = mysqli_query($con,"INSERT INTO `doctorreport` VALUES ('','$doctor','$id','$day','$month','$year')");
			}
		}
	}
}

function addmedicine()
{
	$medicine = trim(htmlspecialchars($_POST['medicine']));

	if (!empty($medicine)) {
		$id = $_GET['id'];
		@require_once "connect.php";
		include "connect.php";

		$sql = "UPDATE `medication` SET `status`='pharmacy',`medical`='$medicine' WHERE `id`='$id'";
		$query = mysqli_query($con,$sql);
		if (!empty($query)) {
			echo '<script>alert("Successfully Add")</script>';
		}
		else{
			echo mysqli_error();
		}
	}
	else{
		echo mysqli_error();
	}
}

function upload()
{
	include "connect.php";
	$id = $_GET['id'];
	$sql = "SELECT * From `medication` WHERE `id`='$id'";
	$query = mysqli_query($con,$sql);
	if (!empty($query)) {
	while ($row = mysqli_fetch_array($query)) {


	$ref = $row['reference_no'];
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="../upload/";
	/* new file size in KB */
	$new_size = $file_size/1024;
	/* new file size in KB */
	/* make file name in lower case */
	$new_file_name = strtolower($file);
	/* make file name in lower case */
	$final_file=str_replace(' ','-',$new_file_name);
}
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{

		$id = $_GET['id'];
		 include "../includes/connect.php";

		$sql="INSERT INTO `image` VALUES(null,'$ref','$final_file','$file_type','$new_size')";
		$query = mysqli_query($con,$sql);

		if(!empty($query)){

			echo '<script>alert("File sucessfully upload")</script>';

		}
		else {
			echo mysqli_error();
		}
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
