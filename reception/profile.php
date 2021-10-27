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

  <link rel="stylesheet" href="css/profile-style1.css">

  <style>

  body{
    background-image : url('css/img/med_bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    color: rgb(1, 11, 232);
  }
  .head1{
    background-color: rgba(110, 231, 231, 0.84);
    border-radius: 10px;
    color: rgb(0, 0, 0);
    width: auto;
    padding-left: 400px;
    padding-right:  100px;
  }
  .head2{

  }
  .head{
    display:flex;
    padding-left: 50px;
    padding-right: 50px;
  }
  .card{
    border-style:outset ;
    border-color:rgba(153, 214, 230, 0.5);
    border-width:2px;
  }
  </style>

</head>

<body>
  <!-- <div class="ScriptTop">
    <div class="rt-container">
      <div class="col-rt-4" id="float-right"> -->
        <!-- Ad Here -->
      <!-- </div>
      <div class="col-rt-2">
        <ul>
          <li><a href="patients-records.php" title="Back to tutorial page">Back</a></li>
        </ul>
      </div>
    </div>
  </div> -->
  <header class="ScriptHeader">
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="head">
          <div class="head2">
            <button onclick="location.href='patients-records.php'" type="button">
              Back</button>
              <button onclick="location.href='index.php'" type="button">
                Dashboard</button>
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
                      <img class="profile_img" src="css/img/medical_bg.jpg" alt="student dp">
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
                      $sql = "SELECT * from `assigned_patient` WHERE `patient_id`='$id' ";
                      $query = mysqli_query($con,$sql);

                      	while ($row = mysqli_fetch_array($query)) {
                        ?>
                      <p class="mb-0"><strong class="pr-1">Patient ID:</strong><?php echo $id;?></p>
                      <p class="mb-0"><strong class="pr-1">Date:</strong><?php echo $month.'-'.$day.'-'.$year;?></p>
                      <a href='profile-curr-status.php?patient_id=<?php echo $id; ?>'>View Current Status</a>
                      <br>
                        <?php
                      }
                        ?>
                    </div>
                  </div>
                  <br>
                  <div class="card shadow-sm" style="border-style:outset ; border-color:rgba(153, 214, 230, 0.5); border-width:2px;">

                  <div class ="card-body">
                    <iframe src="https://beepmyclock.com/widget/alarm" frameborder="0" style="border:0;height:135px;"></iframe>
                    <a href=""><img src="https://printcal.net/web-calendar.png?size=m&w=s&ho=00&mo=00&so=1" alt=""/ style="border-radius: 10px;border-style: outset;border-color: rgba(153, 214, 230, 0.5);"></a>
                  </div>
                </div>
                </div>
                <div class="col-lg-8">
                  <div class="card shadow-sm" style="border-style:outset ; border-color:rgba(153, 214, 230, 0.5); border-width:2px;">
                    <div class="card-header bg-transparent border-0" >
                      <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                    </div>

                    <div class="card-body pt-0">
                      <?php
                      $id = $_GET['patient_id'];
                      require '../includes/connect.php';
                      $sql = "SELECT * from `assigned_patient` WHERE `patient_id`='$id' ";
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
                    <div  class="card-body pt-0">

                      <?php
                      $id = $_GET['patient_id'];
                      $day = date('d');
                      $month = date('m');
                      $year = date('Y');
                      $rand = rand();

                      require '../includes/connect.php';
                      $sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.patient_id='$id' ";
                      $query = mysqli_query($con,$sql);
                      ?>

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
                        <?php
                      	while ($row = mysqli_fetch_array($query)) {
                          $date1 = $row['month'].'-'.$row['date'].'-'.$row['year'];
                          ?>
                        <tr>
                          <td><?php echo $date1;?></td>
                          <td><?php echo $row['complain'];?></td>
                          <td><?php echo $row['findings'];?></td>
                          <td><?php echo $row['treatment'];?></td>
                          <td><?php echo $row['medical'];?></td>
                          <td><?php echo $row['reference_no'];?></td>
                          <td><a href="profile-hist-status.php?reference_no=<?php echo $row['reference_no'];?>">View<a></td>

                        </tr>

                        <?php
                      }
                    echo '  </table>';
                    ?>


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
