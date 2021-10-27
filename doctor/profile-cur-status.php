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
  }
  .card-container{
    display:inline-block;
    align-content: space-between;
    margin: auto;
  }
  .card-container1{
    display:block;
    align-content: space-between;
    margin: auto;
    padding: 40px;
    width: 70%;
  }
  .card-content1{
  border-style: outset;
  padding-left: 20px;
  padding-bottom: 10px;
  
  }
  .card-content{
    padding: 10px;
    margin-top: -70px;
    display:inline-block;
    align-content: space-between;
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

            <button onclick="location.href='profile.php?id=<?php echo $_GET['$id']; ?>'" type="button">
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
                      <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
                      <h3></h3>
                    </div>
                    <div class="card-body">
                      <?php
                        $id = $_GET['id'];
                      require '../includes/connect.php';
                        $day = date('d');
                    		$month = date('m');
                    		$year = date('Y');
                        $rand = rand();
                      $sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.id='$id' ";
                      $query = mysqli_query($con,$sql);

                      	while ($row = mysqli_fetch_array($query)) {
                        ?>
                      <p class="mb-0"><strong class="pr-1">Patient ID:</strong><?php echo $row['patient_id'];?></p>
                      <p class="mb-0"><strong class="pr-1">Patient Name:</strong><?php echo $row['fname'].' '.$row['sname'];?></p>
                      <p class="mb-0"><strong class="pr-1">Date:</strong><?php echo $month.'-'.$day.'-'.$year;?></p>
                      ------------------------------------------------------
                      <p class="mb-0"><strong class="pr-1">Status:</strong><?php echo $row['status'];?></p>
                      <p class="mb-0"><strong class="pr-1">Complain:</strong><?php echo $row['complain'];?></p>
                      <p class="mb-0"><strong class="pr-1">Findings:</strong><?php echo $row['findings'];?></p>
                      <p class="mb-0"><strong class="pr-1">Treatment:</strong><?php echo $row['treatment'];?></p>
                      <p class="mb-0"><strong class="pr-1">Laboratory Test:</strong><?php echo $row['tests'];?></p>
                      <p class="mb-0"><strong class="pr-1">Test Result:</strong><?php echo $row['test_results'];?></p>
                      <p class="mb-0"><strong class="pr-1">Medicine:</strong><?php echo $row['medical'];?></p>
                      <br>
                      <center><form>
                      <input type="submit" value="Done"></input>
                    </form></center>

                        <?php
                      }
                        ?>
                    </div>
                  </div>
                  <br>
                  <div class="card shadow-sm">

                  <div class ="card-body">
                    <a href=""><img src="https://printcal.net/web-calendar.png?size=m&w=s&ho=00&mo=00&so=1" style="border-radius: 10px" alt=""/></a>
                  </div>
                </div>
                </div>
                <div class="col-lg-8">
                  <div class="card shadow-sm ">
                    <div class="card-header">
                      <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Doctor's Consultation</h3>
                    </div>

                    <div class="card-body pt-0">
                    <!-- box2 -->


                    <div class="card-container">
                        <div class="card-content">
                          <h3>
                            <?php
                            require '../includes/connect.php';
                            $id = $_GET['id'];
                            $sql = mysqli_query($con,"SELECT * FROM `medication` WHERE `id`='$id'");
                            while ($row=mysqli_fetch_array($sql)) {
                              $idd = $row['patient_id'];
                              $sql1 = mysqli_query($con,"SELECT * FROM `assigned_patient` WHERE `patient_id`='$idd'");


                            }
                             ?>
                           </h3>
                           <!-- ADD FINDINGS -->
                        <form action="profile-cur-status.php?id=<?php echo $id ; ?>" method="POST">
               				<br><br>
               				<label for="findings"><b>Findings</b></label><br>
               				<textarea required="required" name="findings" id="findings" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea><br>
               				<input type="submit" value="Add Findings" class="btnlink" name="btn"><br><br>
               			    </form>
                        <?php
                        extract($_POST);
                        if (isset($btn) && !empty($findings)) {
                          require "../includes/doctor.php";
                          addfindings();
                        }
                         ?>
                            </div>

                            <!-- ADD LAB TEST -->
                        <div class="card-content">
                        <form action="profile-cur-status.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
                      <br><br>
                      <label for="test"><b>Laboratory Test</b></label><br>
                      <textarea required="required" name="test" id="test" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea><br>
                      <input type="submit" value="Add Laboratory Test" class="btnlink" name="btn"><br><br>
                        </form>
                        <?php
                        extract($_POST);
                        if (isset($btn) && !empty($test)) {
                          require "../includes/doctor.php";
                          addtest();
                        }
                         ?>
                      </div>
                    </div>

                    <div class="card-container">
                      <!-- ADD TREATMENT -->
                        <div class="card-content">
                        <form action="profile-cur-status.php?id=<?php echo $id;?>" method="POST">
               				<br><br>
               				<label for="test"><b>Treatment</b></label><br>
               				<textarea required="required" name="treatment" id="treatment" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea><br>
               				<input type="submit" value="Add Treatment" class="btnlink" name="btn"><br><br>
               			    </form>
                        <?php
                        extract($_POST);
                        if (isset($btn) && !empty($treatment)) {
                          require "../includes/doctor.php";
                          addtreatment();
                        }
                         ?>
                            </div>

                            <!-- ADD PHARMA  -->
                        <div class="card-content">
                        <form action="profile-cur-status.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
                      <br><br>
                      <label for="test"><b>Prescription</b></label><br>
                      <textarea required="required" name="medicine" id="medicine" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea><br>
                      <input type="submit" value="Add Prescription" class="btnlink" name="btn"><br><br>
                        </form>
                        <?php
                        extract($_POST);
                        if (isset($btn) && !empty($medicine)) {
                          require "../includes/doctor.php";
                          addmedicine();
                        }
                         ?>

                      </div>
                    </div>
                    <div class="card-container1">
                      <div class="card-content1">
                        <br>
                      <form action="profile-cur-status.php?id=<?php echo $id = $_GET['id']; ?>" method="post" enctype = "multipart/form-data" class="form_file">
                        <input type="file" name="file" class="file_btn"> </input>
                        <input type="submit" name="upload" value="Upload" class="file_btn" > </input>
                      </form>
                      <?php
                      extract($_POST);
                      if (isset($upload)) {
                        require "../includes/doctor.php";
                        upload();
                      }
                       ?>
                     </div>
                       <div class="card-content2">
                         <br>
                       <form>
                       <input type="submit" value="Done"></input>
                     </form>
                   </div>
                    </div>
                    </div>
                  </div>


                  <div style="height: 26px"></div>
                  <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                      <h3 class="mb-0"><i class="far fa-clone pr-1"></i>HISTORY RECORDS</h3>
                    </div>
                    <div  class="card-body pt-0">

                      <?php
                      $id = $_GET['id'];
                      $day = date('d');
                      $month = date('m');
                      $year = date('Y');
                      $rand = rand();

                      require '../includes/connect.php';
                      $sql = "SELECT * from medication Inner JOIN assigned_patient on medication.patient_id = assigned_patient.patient_id WHERE medication.id='$id' ";
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
                          $patient_id = $row['patient_id'];
                          $date = $row['month'].'-'.$row['date'].'-'.$row['year'];
                          $sql1 = "SELECT * from `medication`  WHERE `patient_id`='$patient_id' ORDER BY  '$date' DESC ";
                          $query1 = mysqli_query($con,$sql1);
                          while ($roww= mysqli_fetch_array($query1)) {
                            $date1 = $roww['month'].'-'.$roww['date'].'-'.$roww['year'];
                          ?>
                        <tr>
                          <td><?php echo $date1;?></td>
                          <td><?php echo $roww['complain'];?></td>
                          <td><?php echo $roww['findings'];?></td>
                          <td><?php echo $roww['treatment'];?></td>
                          <td><?php echo $roww['medical'];?></td>
                          <td><?php echo $roww['reference_no'];?></td>
                          <td><a href="profile-hist-status.php?reference_no=<?php echo $row['reference_no'];?>">View<a></td>

                        </tr>

                        <?php
                      }
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
