<?php
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pharmacy Dashboard - HMS</title>
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
			<div style="padding-left:20px;padding-top:20px;">
			Welcome, <b>Pharmatist</b><br><br>
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>View Suggested Medicine</li><br>
				<li>Add Medicine</li><br>
				<li>Edit Medicine</li><br>
				<li>Delete Medicine</li><br>
				<li>Add Medicine Price</li><br>
				<li>Search Medicine</li><br>
			</ol>
		</div>
		</div>
		<?php
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
