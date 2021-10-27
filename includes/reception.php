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
	// $sql = "SELECT *  from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id Where ;";
	$sql = "SELECT * FROM `assigned_patient`";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {


		echo "<tr height=30px'>";
		echo "<td>P-".$row['patient_id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td>".$row['birthyear']."</td>";
		echo "<td><center><a href='profile.php?patient_id=".$row['patient_id']."'>View</a></center></td>";
		echo "<td><center><a href='editpatient-records.php?patient_id=".$row['patient_id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deletepatient-records.php?patient_id=".$row['patient_id']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
		echo "</tr>";
	}
}

function viewpatients_records()
{
	$id = $_GET['patient_id'];
	require 'connect.php';
	$sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.patient_id='$id'";
	$query = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($query)) {
		$year = date('Y') - $row['birthyear'];
		echo "
		<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PATIENT ID</b></td>
				<td>P-".$row['patient_id']."</td>
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

function viewpatients_status()
{

	$id = $_GET['patient_id'];
	require 'connect.php';
	$sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.patient_id='$id'";
	$query = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($query)) {
		$year = date('Y') - $row['birthyear'];
		echo "
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>STATUS</b></td>
				<td>".$row['status']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PATIENT ID</b></td>
				<td>P-".$row['patient_id']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PATIENT'S NAME</b></td>
				<td>".$row['fname']." ".$row['sname']."</td>
			</tr>
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

		";
	}

}

function viewpatients_bills()
{

	$id = $_GET['patient_id'];
	require 'connect.php';
	$sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.patient_id='$id'";
	$query = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($query)) {
		$total = $row['test_price'] + $row['doctor_price'] + $row['medical_price'] ;
		echo "
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PATIENT'S NAME</b></td>
				<td>".$row['fname']." ".$row['sname']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>Doctor's Fee</b></td>
				<td>P ".$row['doctor_price']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>Test Fee</b></td>
				<td>P ".$row['test_price']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>Medical Fee</b></td>
				<td>P ".$row['medical_price']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>TOTAL FEE</b></td>
				<td>P ".$total."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>STATUS</b></td>
				<td>UNPAID</td>
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
function view_oldpatient()
{
	$id = $_GET['patient_id'];
	require 'connect.php';
	$sql = "SELECT * FROM `assigned_patient` WHERE `patient_id`='$id'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$year = date('Y') - $row['birthyear'];
		echo "
		<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ID</b></td>
				<td>".$row['patient_id']."</td>
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
	$sql = "SELECT * FROM `patient` WHERE `fname` LIKE '%$sachi%' or `sname` LIKE '%$sachi%'";
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

function searchpatients_records()
{
	require 'connect.php';
	$sachi = $_GET['s'];
	$sql = "SELECT * FROM `assigned_patient` WHERE `fname` LIKE '%$sachi%' or `sname` LIKE '%$sachi%'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>P-".$row['patient_id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td><center><a href='profile.php?patient_id=".$row['patient_id']."'>View</a></center></td>";
		echo "<td><center><a href='editpatient-records.php?patient_id=".$row['patient_id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deletepatient-records.php?patient_id=".$row['patient_id']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
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
	$image = $_POST['imgfile'];

	require_once "connect.php";
	include "connect.php";

	$sql = "INSERT INTO `patient` VALUES (null,'$fname','$sname','$email','$address','$phone','$gender','$bloodgroup','$birthyear','$image')";
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
	$complain = trim(htmlspecialchars($_POST['complain']));

	require_once "connect.php";
	$id = $_GET['id'];
	$day = date('d');
		$month = date('m');
		$year = date('Y');
		$test_price = "0";
		$medical_price = "0";


	if ($doctor=="WomenDoctor") {
		$price = 0;

				$sql = "INSERT INTO `medication` VALUES (null,'$id','recdoctor','','','','','$doctor','$price','$test_price','$medical_price','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
				echo mysqli_error($con);
			}

			$id = $_GET['id'];
			require 'connect.php';
			$sql2 = "SELECT * FROM `patient` WHERE `id`='$id'";
			$query2 = mysqli_query($con,$sql2);
			while ($row = mysqli_fetch_array($query2)) {

			$id = $row['id'];
			$fname = $row['fname'];
			$sname = $row['sname'];
			$email = $row['email'];
			$address = $row['address'];
			$phone = $row['phone'];
			$sex = $row['sex'];
			$bloodgroup = $row['bloodgroup'];
			$birthyear = $row['birthyear'];


			$sql2 = "INSERT INTO `assigned_patient` VALUES (null,'$id','$fname','$sname','$email','$address','$phone','$sex','$bloodgroup','$birthyear')";

			$query2 = mysqli_query($con,$sql2);
			if (!empty($query2)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
			echo mysqli_error($con);
			}

			}

			session_start();
			if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
				header("Location: ../index.php");
			}
			else{
				$id = $_GET['id'];

				require_once "../includes/connect.php";
				$sql3 = "DELETE FROM `patient` WHERE `id`='$id'";
				$query3 = mysqli_query($con,$sql3);
				if (!empty($query3)) {
					header("Location: patients.php");
				}
			}
	}

	elseif ($doctor=="NormalDoctor") {
		$price = 0;
		$rand = rand(10000,99999);

				$sql = "INSERT INTO `medication` VALUES (null,'$id','recdoctor','$complain','','','','','','$doctor','$rand','$price','$test_price','$medical_price','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
				echo mysqli_error($con);
			}
			$id = $_GET['id'];
			require 'connect.php';
			$sql = "SELECT * FROM `patient` WHERE `id`='$id'";
			$query = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($query)) {

			$id = $row['id'];
			$fname = $row['fname'];
			$sname = $row['sname'];
			$email = $row['email'];
			$address = $row['address'];
			$phone = $row['phone'];
			$sex = $row['sex'];
			$bloodgroup = $row['bloodgroup'];
			$birthyear = $row['birthyear'];

			$sql2 = "INSERT INTO `assigned_patient` VALUES (null,'$id','$fname','$sname','$email','$address','$phone','$sex','$bloodgroup','$birthyear')";
			$query2 = mysqli_query($con,$sql2);
			if (!empty($query2)) {
			}
			else{
			echo mysqli_error($con);
			}
			}
				$id = $_GET['id'];
				require_once "../includes/connect.php";
				$sql3 = "DELETE FROM `patient` WHERE `id`='$id'";
				$query3 = mysqli_query($con,$sql3);
				if (!empty($query3)) {
				}



	}
	elseif ($doctor=="DentalDoctor") {
		$price = 0;

				$sql = "INSERT INTO `medication` VALUES (null,'$id','recdoctor','','','','','$doctor','$price','$test_price','$medical_price','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
				echo mysqli_error($con);
			}

			$id = $_GET['id'];
			require 'connect.php';
			$sql2 = "SELECT * FROM `patient` WHERE `id`='$id'";
			$query2 = mysqli_query($con,$sql2);
			while ($row = mysqli_fetch_array($query2)) {

			$id = $row['id'];
			$fname = $row['fname'];
			$sname = $row['sname'];
			$email = $row['email'];
			$address = $row['address'];
			$phone = $row['phone'];
			$sex = $row['sex'];
			$bloodgroup = $row['bloodgroup'];
			$birthyear = $row['birthyear'];


			$sql2 = "INSERT INTO `assigned_patient` VALUES (null,'$id','$fname','$sname','$email','$address','$phone','$sex','$bloodgroup','$birthyear')";

			$query2 = mysqli_query($con,$sql2);
			if (!empty($query2)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
			echo mysqli_error($con);
			}

			}

			session_start();
			if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
				header("Location: ../index.php");
			}
			else{
				$id = $_GET['id'];

				require_once "../includes/connect.php";
				$sql3 = "DELETE FROM `patient` WHERE `id`='$id'";
				$query3 = mysqli_query($con,$sql3);
				if (!empty($query3)) {
					header("Location: patients.php");
				}
			}
	}
}

function assigntodoctor_oldp()
{
	include "connect.php";
	$doctor = trim(htmlspecialchars($_POST['doctor']));
	$complain = trim(htmlspecialchars($_POST['complain']));
	require_once "connect.php";
	$id = $_GET['patient_id'];
	$day = date('d');
		$month = date('m');
		$year = date('Y');
		$test_price = "0";
		$medical_price = "0";
		$price = 0;
		$rand = rand(10000,99999);

				$sql = "INSERT INTO `medication` VALUES (null,'$id','recdoctor','$complain','','','','','','$doctor','$rand','$price','$test_price','$medical_price','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
			}
			else{
				echo mysqli_error($con);
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


function updatepatient_records()
{
	$id = $_GET['patient_id'];
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

	$sql = "UPDATE `assigned_patient` SET `fname`='$fname',`sname`='$sname',`email`='$email',`address`='$address',`phone`='$phone',`sex`='$gender',`bloodgroup`='$bloodgroup',`birthyear`='$birthyear' WHERE `patient_id`='$id'";
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
