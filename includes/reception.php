<?php

function patients()
{
	require 'connect.php';
	$sql = "SELECT * FROM `patient`";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td><center><a href='viewpatient.php?id=".$row['id']."'>View</a></center></td>";
		echo "<td><center><a href='editpatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deletepatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
		echo "</tr>";
	}
}

function patients_records()
{
	require 'connect.php';
	$sql = "SELECT * from medication Inner JOIN patient on medication.patient_id = patient.id;";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>".$row['patient_id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td>".$row['birthyear']."</td>";
		echo "<td><center><a href='viewpatient-records.php?patient_id=".$row['patient_id']."'>View</a></center></td>";
		echo "<td><center><a href='editpatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deletepatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
		echo "</tr>";
	}
}

function viewpatients_records()
{
	$id = $_GET['patient_id'];
	require 'connect.php';
	$sql = "SELECT * from medication Inner JOIN patient on medication.patient_id = patient.id WHERE `patient_id`='$id'";
	$query = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($query)) {
		$year = date('Y') - $row['birthyear'];
		echo "
		<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ID</b></td>
				<td>".$row['patient_id']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>STATUS</b></td>
				<td>".$row['status']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PATIENT'S NAME</b></td>
				<td>".$row['fname']." ".$row['sname']."</td>
			</tr>

			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>EMAIL</b></td>
				<td>".$row['email']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ADDRESS</b></td>
				<td>".$row['address']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PHONE</b></td>
				<td>".$row['phone']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>GENDER</b></td>
				<td>".$row['sex']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>BLOOD TYPE</b></td>
				<td>".$row['bloodgroup']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>AGE</b></td>
				<td>".$year."</td>
			</tr>
		";
	}

}

function viewpatients_records2()
{
	$id = $_GET['patient_id'];
	require 'connect.php';
	$sql = "SELECT * from medication Inner JOIN patient on medication.patient_id = patient.id WHERE `patient_id`='$id'";
	$query = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($query)) {
		$year = date('Y') - $row['birthyear'];
		echo "
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>DOCTOR TYPE</b></td>
				<td>".$row['doctor_type']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>SYMPTOMS</b></td>
				<td>".$row['symptoms']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>TESTS</b></td>
				<td>".$row['tests']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>TEST RESULT</b></td>
				<td>".$row['test_results']."</td>
			</tr>

			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>MEDICAL</b></td>
				<td>".$row['medical']."</td>
			</tr>

			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>MEDICAL</b></td>

			</tr>
		";
	}

}


function viewpatient()
{
	$id = $_GET['id'];
	require 'connect.php';
	$sql = "SELECT * FROM `patient` WHERE `id`='$id'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$year = date('Y') - $row['birthyear'];
		echo "
		<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ID</b></td>
				<td>".$row['id']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>FIRSTNAME</b></td>
				<td>".$row['fname']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>SURNAME</b></td>
				<td>".$row['sname']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>EMAIL</b></td>
				<td>".$row['email']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ADDRESS</b></td>
				<td>".$row['address']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PHONE</b></td>
				<td>".$row['phone']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>GENDER</b></td>
				<td>".$row['sex']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>BLOOD GRUOP</b></td>
				<td>".$row['bloodgroup']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>YEARS</b></td>
				<td>".$year."</td>
			</tr>
		";

	}
}


function searchpatients()
{
	require 'connect.php';
	$sachi = $_GET['s'];
	$sql = "SELECT * FROM `patient` WHERE `id` LIKE '%$sachi%'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>P-".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td><center><a href='viewpatient.php?id=".$row['id']."'>View</a></center></td>";
		echo "<td><center><a href='editpatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deletepatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
		echo "</tr>";
	}
}


function addpatient()
{
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$email = trim(htmlspecialchars($_POST['email']));
	$phone = trim(htmlspecialchars($_POST['phone']));
	$address = trim(htmlspecialchars($_POST['address']));
	$gender = trim(htmlspecialchars($_POST['gender']));
	$birthyear = trim(htmlspecialchars($_POST['birthyear']));
	$bloodgroup = trim(htmlspecialchars($_POST['bloodgroup']));

	require_once "connect.php";
	include "connect.php";

	$sql = "INSERT INTO `patient` VALUES (null,'$fname','$sname','$email','$address','$phone','$gender','$bloodgroup','$birthyear')";
	$query = mysqli_query($con,$sql);
	if (!empty($query)) {
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Added</b><br><br>";
	}
	else{
		echo mysqli_error($con);
	}
}

function assigntodoctor()
{
	include "connect.php";
	$doctor = trim(htmlspecialchars($_POST['doctor']));

	require_once "connect.php";
	$id = $_GET['id'];
	$day = date('d');
		$month = date('m');
		$year = date('Y');
		$test_price = "100";
		$medical_price = "100";


	if ($doctor=="WomenDoctor") {
		$price = 40000;

				$sql = "INSERT INTO `medication` VALUES (null,'$id','recdoctor','','','','','$doctor','$price','$test_price','$medical_price','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
				echo mysqli_error($con);
			}
	}

	elseif ($doctor=="NormalDoctor") {
		$price = 20000;
		$sql = "INSERT INTO `medication` VALUES (null,'$id','recdoctor','','','','','$doctor','$price','$test_price','$medical_price','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
				echo mysqli_error($con);
			}
	}
	elseif ($doctor=="DentalDoctor") {
		$price = 30000;

		$sql = "INSERT INTO `medication` VALUES (null,'$id','recdoctor','','','','','$doctor','$price','$test_price','$medical_price','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
				echo mysqli_error($con);
			}
	}


}

function updatepatient()
{
	$id = $_GET['id'];
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$email = trim(htmlspecialchars($_POST['email']));
	$phone = trim(htmlspecialchars($_POST['phone']));
	$address = trim(htmlspecialchars($_POST['address']));
	$gender = trim(htmlspecialchars($_POST['gender']));
	$birthyear = trim(htmlspecialchars($_POST['birthyear']));
	$bloodgroup = trim(htmlspecialchars($_POST['bloodgroup']));

	require_once "connect.php";
	include "connect.php";

	$sql = "UPDATE `patient` SET `fname`='$fname',`sname`='$sname',`email`='$email',`address`='$address',`phone`='$phone',`sex`='$gender',`bloodgroup`='$bloodgroup',`birthyear`='$birthyear' WHERE `id`='$id'";
	//$sql = "INSERT INTO `` VALUES ('','$fname','$sname','$email','$address','$phone','$gender','$bloodgroup','$birthyear')";
	$query = mysqli_query($con,$sql);
	if (!empty($query)) {
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Updated</b><br><br>";
	}
	else{
		echo mysqli_error($con);
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
		$name = $_SESSION['reception'];
		$type = $_SESSION['type'];

				$sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				include "connect.php";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}
		}
	}

?>
