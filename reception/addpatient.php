<?php
session_start();
if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Add Patient - HMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/style-form1.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<style type="text/css">

		body{
			background-image : url('css/img/med_bg.jpg');
			background-repeat: no-repeat;
		  background-size: cover;
			color: rgb(0, 2, 45);
		}
		</style>

</head>

<body>

	<a href="patients.php" style="margin-left:30px; height:200px;">
		<button class="btnlink" style="height:40px; width:90px; "><b>Back</b></button></a><br>


	<section class="get-in-touch">
 <h1 class="title">Add Patient</h1>
 <form action="addpatient.php" class="contact-form row"  method="POST">
		<div class="form-field col x-50">
			 <input id="name" name="fname" class="input-text js-input" type="text" required>
			 <label class="label" for="name">First Name</label>
		</div>
		<div class="form-field col x-50">
			 <input id="name" name="sname" class="input-text js-input" type="text" required>
			 <label class="label" for="email">Last Name</label>
		</div>
		<div class="form-field col x-50">
			 <input id="email" name="email" class="input-text js-input" type="email" required>
			 <label class="label" for="message">E-mail</label>
		</div>
	<div class="form-field col x-50">
			 <input id="message" name="phone" class="input-text js-input" type="text" required>
			 <label class="label" for="message">Phone Number</label>
		</div>
		<div class="form-field col x-100">
				 <input id="message" name="address" class="input-text js-input" type="text" required>
				 <label class="label" for="message">Address</label>
			</div>
	<div class="form-field col x-50">

		<select id="message" name="gender" class="input-text js-input"  name="gender"  required>
				<option value="">Gender</option>
				<option>Male</option>
				<option>Female</option>
			</select>

		</div>
		<?php $years = range(1950, strftime("%Y", time())); ?>
		<div class="form-field col x-50">
			<select name="birthyear" class="input-text js-input" required="required">
				<option value="">Birth Year</option>
				<?php foreach($years as $year) : ?>
				<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
				<?php endforeach; ?>
			</select>
			</div>

				<div class="form-field col x-50">

					<select id="message" name="bloodgroup" class="input-text js-input"  name="gender"  required="required">
							<option value="">Blood Type</option>
							<option>A-positive (A+)</option>
							<option>A-negative (A-)</option>
							<option>B-positive (B+)</option>
							<option>B-negative (B-)</option>
							<option>AB-positive (AB+)</option>
							<option>AB-negative (AB-)</option>
							<option>O-positive (O+)</option>
							<option>O-negative (O-)</option>
						</select>
					</div>
					<div class="form-field col x-50">
						<input type="file" name="imgfile" class="input-text js-input" placeholder="" required="required"><br><br>
						<label class="label" for="imgfile">Upload Picture</label>
						</div>

		<div class="form-field col x-100 align-center">
			 <input class="submit-btn" name="btn" value="ADD" type="submit" value="Submit">
		</div>
 </form>
 <?php
 extract($_POST);
 if (isset($btn) && !empty($fname) && !empty($sname) &&!empty($email)&&!empty($phone)&&!empty($address)&&!empty($gender)&&!empty($birthyear) && !empty($bloodgroup)) {
	 require "../includes/reception.php";
	 addpatient();
 }
	?>
 <script>
 $( '.js-input' ).keyup(function() {
	 if( $(this).val() ) {
			$(this).addClass('not-empty');
	 } else {
			$(this).removeClass('not-empty');
	 }
 });
 </script>
</section>




</body>
</html>
