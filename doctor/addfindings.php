<?php

include  "../includes/connect.php"

$id = $_GET['patient_id'];
$symptoms = trim(htmlspecialchars($_POST['symptoms']));

$sql = "UPDATE `medication` SET `status`='laboratory',`symptoms`='$symptoms',`tests`='$test' WHERE `id`='$id'";
$query = mysqli_query($con,$sql);

?>
