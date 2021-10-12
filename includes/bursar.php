<?php

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
		$name = $_SESSION['bursar'];
		$type = $_SESSION['type'];

				$sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}
		}
	}
	function patients2()
	{
		require 'connect.php';
		$sql = "SELECT * from medication Inner JOIN patient on medication.patient_id = patient.id;";
		$query = mysqli_query($con,$sql);
		while ($row = mysqli_fetch_array($query)) {
			echo "<tr height=30px'>";
			echo "<td>".$row['fname']."</td>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['status']."</td>";
			echo "<td>".$row['symptoms']."</td>";
			echo "<td>".$row['tests']."</td>";
			echo "<td>".$row['test_results']."</td>";
			echo "<td><center><a href='viewpatient.php?id=".$row['id']."'>View</a></center></td>";
			echo "<td><center><a href='editpatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
			echo "<td><center><a href='deletepatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
			echo "</tr>";
		}
	}


?>
