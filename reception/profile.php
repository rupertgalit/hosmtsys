<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Profile</title>

  <meta name="author" content="Codeconvey" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

  <!--Only for demo purpose - no need to add.-->
  <link rel="stylesheet" href="css/profile-demo.css" />

  <link rel="stylesheet" href="css/profile-style.css">
</head>

<body>

  <div class="ScriptTop">
    <div class="rt-container">
      <div class="col-rt-4" id="float-right">
        <!-- Ad Here -->
      </div>
      <div class="col-rt-2">
        <ul>
          <li><a href="patients-records.php" title="Back to tutorial page">Back</a></li>
        </ul>
      </div>
    </div>
  </div>

  <header class="ScriptHeader">
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="rt-heading">
          <div class="ScriptTop">
            <div class="rt-container">
              <h1>patient's details</h1>

                <ul>
                  <li><a href="patients-records.php" title="Back to tutorial page">Back</a></li>
                </ul>
            

            </div>

          </div>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="Scriptcontent">

          <!-- Student Profile -->
          <div class="student-profile py-4">
            <div class="container">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card shadow-sm">
                    <div class="card-header bg-transparent text-center">
                      <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
                      <h3></h3>
                    </div>

                    <div class="card-body">
                      <?php
                        $id = $_GET['patient_id'];
                      require '../includes/connect.php';
                        $day = date('d');
                    		$month = date('m');
                    		$year = date('Y');
                        $rand = rand();
                      $sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.patient_id='$id' ";
                      $query = mysqli_query($con,$sql);

                      	while ($row = mysqli_fetch_array($query)) {
                        ?>
                      <p class="mb-0"><strong class="pr-1">Patient ID:</strong>P2021<?php echo $rand;?></p>
                      <p class="mb-0"><strong class="pr-1">Status:</strong><?php echo $row['status'];?></p>

                      <p class="mb-0"><strong class="pr-1">Date:</strong><?php echo $month.'-'.$day.'-'.$year;?></p>
                      <a href="">View Current Status</a>
                      <br>
                        <?php
                      }
                        ?>
                    </div>
                  </div>
                  <br>
                  <div class="card shadow-sm">

                  <div class ="card-body">
                    <a href=""><img src="https://printcal.net/web-calendar.png?size=m&w=s&ho=00&mo=00&so=1" alt=""/></a>
                  </div>
                </div>
                </div>
                <div class="col-lg-8">
                  <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                      <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                    </div>

                    <div class="card-body pt-0">
                      <?php
                      $id = $_GET['patient_id'];
                      require '../includes/connect.php';
                      $sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.patient_id='$id' ";
                      $query = mysqli_query($con,$sql);
                      ?>
                      <table class="table table-bordered">
                        <?php

                      	while ($row = mysqli_fetch_array($query)) {
                          ?>

                        <tr>
                          <th width="30%">Name</th>
                          <td width="2%">:</td>
                          <td><?php echo $row['fname'].' '.$row['sname'];?></td>
                        </tr>
                        <tr>
                          <th width="30%">Email Address</th>
                          <td width="2%">:</td>
                          <td><?php echo $row['email'];?></td>
                        </tr>
                        <tr>
                          <th width="30%">Address</th>
                          <td width="2%">:</td>
                          <td><?php echo $row['address'];?></td>
                        </tr>
                        <tr>
                          <th width="30%">Phone</th>
                          <td width="2%">:</td>
                          <td><?php echo $row['phone'];?></td>
                        </tr>
                        <tr>
                          <th width="30%">Gender</th>
                          <td width="2%">:</td>
                          <td><?php echo $row['sex'];?></td>
                        </tr>
                        <tr>
                          <th width="30%">Bloodtype</th>
                          <td width="2%">:</td>
                          <td><?php echo $row['bloodgroup'];?></td>
                        </tr>
                        <tr>
                          <th width="30%">Birthyear</th>
                          <td width="2%">:</td>
                          <td><?php echo $row['birthyear'];?></td>
                        </tr>
                        <?php
                      }
                    echo '  </table>';
                    ?>

                    </div>
                  </div>

                  <div style="height: 26px"></div>
                  <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                      <h3 class="mb-0"><i class="far fa-clone pr-1"></i>HISTORY RECORDS</h3>
                    </div>
                    <div width="150%" class="card-body pt-0">
                      <table class="table table-bordered">
                        <tr>
                          <th >Date</th>
                          <th>Complains</th>
                          <th>Findings</th>
                          <th>Treatment</th>
                          <th>Medicine</th>
                          <th>Reference No</th>
                          <th>Details</th>

                        </tr>
                        <tr>
                          <td>10-20-2021</td>
                          <td>Chest Pain</td>
                          <td>Cardiac Arrest</td>
                          <td>Surgery</td>
                          <td>Biomega</td>
                          <td>6394855215</td>
                          <td>View</td>
                        </tr>
                        <tr>
                          <td>05-15-2021</td>
                          <td>Chest Pain</td>
                          <td>Acid Reflux</td>
                          <td>Surgery</td>
                          <td>VCO</td>
                          <td>63958244558</td>
                          <td>View</td>
                        </tr>


                    </div><!--card body-->
                  </div><!--card shadow-->
                </div><!--col8-->
              </div><!--row-->
            </div><!--container-->
          </div><!--student profile-->
          <!-- partial -->

        </div>
      </div>
    </div>
  </section>



  <!-- Analytics -->

</body>

</html>
