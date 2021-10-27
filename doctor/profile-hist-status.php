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
  <link rel="stylesheet" href="css/profile-demo.css"/>
  <link rel="stylesheet" href="css/profile-style.css">

  <style>

  body{
    background-image : url('css/img/med_bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    color: rgb(1, 11, 232);
  }
  .form{
    display: inline-flex;
    width: 300px;
    border-radius: 10px;
  }
  .btnlink{
    border-radius: 10px;
  }
  .card {
    background:rgba(153, 214, 230, 0.28);
    display: flex;
    border-style:outset ;
    border-color:rgba(153, 214, 230, 0.5);
    border-width:2px;
    align-items: center;
  }
  .card-body1{
    border-style: ridge;
    width: auto;
    margin-bottom:50px;
    border-radius: 5px;
    align-items: center;
    background:rgba(213, 230, 235, 0.28);
    border-color:rgba(195, 195, 195, 0.5);
  }
  .table{
    width:450px;
    align-items: center;
    margin-top: 10px;

  }

  .card-container{
    display:inline-block;
    align-content: space-between;
    margin: auto;
  }
  .card-content{
    padding: 10px;
    margin-top: -70px;
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
            <?php
            include "../includes/connect.php";
            $ref = $_GET ['reference_no'];
            $sql = "SELECT * from `medication` WHERE `reference_no`='$ref' ";
            $query = mysqli_query($con,$sql);

              while ($row = mysqli_fetch_array($query)) {
                ?>
            <button onclick="location.href='profile.php?id=<?php echo $row['id']; ?>'" type="button">
              Back</button>
              <button onclick="location.href='index.php'" type="button">
                Dashboard</button>
                <?php
              }
              ?>

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
                      $ref = $_GET['reference_no'];
                      require '../includes/connect.php';
                        $day = date('d');
                    		$month = date('m');
                    		$year = date('Y');
                        $rand = rand();
                      $sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.reference_no='$ref' ";
                      $query = mysqli_query($con,$sql);

                      	while ($row = mysqli_fetch_array($query)) {
                        ?>
                      <p class="mb-0"><strong class="pr-1">Patient ID:</strong><?php echo $row['patient_id'];?></p>
                      <p class="mb-0"><strong class="pr-1">Patient Name:</strong><?php echo $row['fname'].' '.$row['sname'];?></p>
                      <p class="mb-0"><strong class="pr-1">Date:</strong><?php echo $month.'-'.$day.'-'.$year;?></p>
                      <br>


                        <?php
                      }
                        ?>
                    </div>
                  </div>
                  <br>
                  <div class="card shadow-sm">

                  <div class ="card-body">
                    <iframe src="https://beepmyclock.com/widget/alarm" frameborder="0" style="border:0;height:135px;"></iframe>
                    <a href=""><img src="https://printcal.net/web-calendar.png?size=m&w=s&ho=00&mo=00&so=1" style="border-radius: 10px;border-style: outset;border-color: rgba(153, 214, 230, 0.5);" alt=""/></a>
                  </div>
                </div>
                </div>
                <div class="col-lg-8">
                  <div class="card shadow-sm ">
                    <br>
                    <div class="card-header">
                      <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Patient's Record</h3>
                    </div>
                    
                    Reference No.
                    <h5><?php echo $ref ?></h5>

                    <div class="card-body1 pt-0">
                      <?php
                      $ref = $_GET ['reference_no'];
                      $day = date('d');
                      $month = date('m');
                      $year = date('Y');
                      require '../includes/connect.php';
                      $sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE  medication.reference_no='$ref' ";
                      $query = mysqli_query($con,$sql);
                      ?>
                      <center>
                        <table class="table ">
                        <?php

                      	while ($row = mysqli_fetch_array($query)) {
                          $age = $year - $row['birthyear'];
                          ?>

                        <tr>
                          <th >Date</th>
                          <td>:</td>
                          <td><b><?php echo $month.'-'.$day.'-'.$year;?></b></td>
                        </tr>
                        <tr>
                          <th >Reference No.</th>
                          <td>:</td>
                          <td><b><?php echo $row['reference_no']?></b></td>
                        </tr>

                        <tr>
                          <th>Status</th>
                          <td >:</td>
                          <td><?php echo $row['status'];?></td>
                        </tr>
                        <tr>
                          <th>Patient's Name</th>
                          <td >:</td>
                          <td><?php echo $row['fname'].' '.$row['sname'];?></td>
                        </tr>
                        <tr>
                          <th>Gender</th>
                          <td >:</td>
                          <td><?php echo $row['sex'];?></td>
                        </tr>
                        <tr>
                          <th>Age</th>
                          <td >:</td>
                          <td><?php echo $age;?></td>
                        </tr>
                        <tr>
                          <th>*********************</th>
                          <td ></td>
                          <td>************************</td>
                        </tr>

                        <tr>
                          <th >Complain</th>
                          <td>:</td>
                          <td><?php echo $row['complain'];?></td>
                        </tr>
                        <tr>
                          <th >Findings</th>
                          <td>:</td>
                          <td><?php echo $row['findings'];?></td>
                        </tr>
                        <tr>
                          <th >Treatment</th>
                          <td >:</td>
                          <td><?php echo $row['treatment'];?></td>
                        </tr>
                        <tr>
                          <th>Laboratory Test</th>
                          <td >:</td>
                          <td><?php echo $row['tests'];?></td>
                        </tr>
                        <tr>
                          <th >Test Results</th>
                          <td >:</td>
                          <td><?php echo $row['test_results'];?></td>
                        </tr>
                        <tr>
                          <th>Medicine</th>
                          <td>:</td>
                          <td><?php echo $row['medical'];?></td>
                        </tr>

                        <?php
                      }
                    echo '  </table>';
                    ?>
                  </center>
                    </div>
                  </div>


                  <div style="height: 26px"></div>
                  <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                      <center>
                      <h3 class="mb-0"><i class="far fa-clone pr-1">Attached Documents</i></h3>
                    </center><br>
                      <?php
                      $ref = $_GET ['reference_no'];
                      $day = date('d');
                      $month = date('m');
                      $year = date('Y');
                      require '../includes/connect.php';
                      $sql = "SELECT * from medication Inner JOIN image on medication.reference_no = image.reference_no WHERE  medication.reference_no='$ref' ";
                      $query = mysqli_query($con,$sql);
                      ?>
                      <center>
                        Reference No.
                        <h5><?php echo $ref ?></h5>
                        <table class="table ">
                        <?php

                        while ($row = mysqli_fetch_array($query)) {

                          ?>

                          <tr>
                          <td><?php echo $row["file"]; ?></td>
                          <td><?php echo $row["type"]; ?></td>
                          <td><?php echo $row["size"]; ?> kb</td>
                          <td><a href="../upload/<?php echo $row['file'] ?>" target="_blank">view</a></td>
                          </tr>
                        <?php
                      }
                    echo '  </table>';
                    ?>

                    </div>
                    <div  class="card-body pt-0">
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
