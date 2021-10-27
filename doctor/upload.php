
<?php
include "../includes/connect.php";



$conn = mysqli_connect('localhost', 'root', '', 'file-management');



if(isset($_POST['upload']))
{



 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../upload/";

 /* new file size in KB */
 $new_size = $file_size/1024;
 /* new file size in KB */
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */

 $final_file=str_replace(' ','-',$new_file_name);

 if(move_uploaded_file($file_loc,$folder.$final_file))
 {

   $id = $_GET['id'];
    include "../includes/connect.php";

   $sql="INSERT INTO `image` VALUES(null,'$final_file','$file_type','$new_size')";
   $query = mysqli_query($con,$sql);

   if(!empty($query)){
     header("Location: profile-cur-status.php?id=$id");
     // echo '<script>alert("File sucessfully upload")</script>';
     echo " Succesifully Uploaded";
   }
   else {
     echo mysqli_error();
   }

 }
 else
 {

  echo "Error.Please try again";

		}
	}


?>
