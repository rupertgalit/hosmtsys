<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>

	  		<h1><a href="index.php" class="logo">
				<img class="mb-1" src="../assets/brand/HMSlogo.png" alt="" width="170" height="60" padding-bottom="5px" shadow=" 10px 10px 5px grey" background-color="black"></a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="index.php"><span class="fa fa-home mr-3"></span> Homepage</a>
          </li>
          <li>
              <a href="reception.php"><span class="fa fa-user mr-3"></span>From Reception
								<?php
									@require "./../includes/connect.php";
									$typee = $_SESSION['type'];
									$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND (`status`='recdoctor' or `status`='Consultation')";
									$query = mysqli_query($con,$sql);
									echo "(".mysqli_num_rows($query).")";
								?>
							</a>
          </li>
          <li>
            <a href="laboratory.php"><span class="fa fa-sticky-note mr-3"></span>From laboratory
							<?php
								@require "./../includes/connect.php";
								$typee = $_SESSION['type'];
								$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='labdoctor'";
								$query = mysqli_query($con,$sql);
								echo "(".mysqli_num_rows($query).")";
							?>
						</a>
          </li>
					<li>
            <a href="patients-records.php"><span class="fa fa-bar-chart mr-3"></span>Patient's Records
						
						</a>
					</li>
          <li>
            <a href="settings.php"><span class="fa fa-cog mr-3"></span> Settings</a>
          </li>
          <li>
            <a href="../logout.php"><span class="fa fa-power-off mr-3"></span> Logout</a>
          </li>
          <li>

          </li>
        </ul>

    	</nav>




<!-- <div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar">
		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-primary">
				<i class="fa fa-bars"></i>
				<span class="sr-only">Toggle Menu</span>
			</button>
		</div>

		<h1><a href="index.php" class="logo">Project Name</a></h1>
		<ul class="list-unstyled components mb-5">
	<center>
		<li class="active">
		<a href="index.php"><button class="btnlink">Home</button></a><br><br>
		</li>
		<li>
		<a href="reception.php"><button class="btnlink" style="height:auto !important;">From Reception
		<?php
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='recdoctor'";
			$query = mysqli_query($con,$sql);
			echo "(".mysqli_num_rows($query).")";
		?>
		</button></a><br><br>
		</li>
		<li>
		<a href="laboratory.php"><button class="btnlink" style="height:auto !important;">From Laboratory
		<?php
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='labdoctor'";
			$query = mysqli_query($con,$sql);
			echo "(".mysqli_num_rows($query).")";
		?>
		</button></a><br><br>
		</li>
		<li>
		<a href="reports.php"><button class="btnlink">Reports</button></a><br><br>
		</li>
		<li>
		<a href="settings.php"><button class="btnlink">Settings</button></a><br><br>
		</li>
	</center>
</ul>

</div> -->
