<!DOCTYPE html>
<html>
<head>
<title>File Upload</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<button type="submit" name="upload">upload</button>
</form>
<?php
include "includes/connect.php";



$conn = mysqli_connect('localhost', 'root', '', 'file-management');



if(isset($_POST['upload']))
{



 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="upload/";

 /* new file size in KB */
 $new_size = $file_size/1024;
 /* new file size in KB */
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */

 $final_file=str_replace(' ','-',$new_file_name);

 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
   $sql="INSERT INTO `image` VALUES(null,'$final_file','$file_type','$new_size')";
   $query = mysqli_query($con,$sql);


  echo "File sucessfully upload";


 }
 else
 {

  echo "Error.Please try again";

		}
	}





?>
</body>
</html>
