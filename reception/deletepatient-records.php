<?php
session_start();
if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
else{
	$id = $_GET['patient_id'];

	require_once "../includes/connect.php";
	$sql = "DELETE FROM `assigned_patient` WHERE `patient_id`='$id'";
	$query = mysqli_query($con,$sql);
	if (!empty($query)) {
		header("Location: patients-records.php");
	}
}
?>
