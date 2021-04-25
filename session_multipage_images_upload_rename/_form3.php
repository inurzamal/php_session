<?php
session_start();

include("connection.php");

  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['submit'])) {

    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
  
    $filename1 = $_FILES["photo"]["name"];
    $tempname1 = $_FILES["photo"]["tmp_name"];
    $folder1 = "image/".$filename1;


    $filename2 = $_FILES["signature"]["name"];
    $tempname2 = $_FILES["signature"]["tmp_name"];    
    $folder2 = "image/".$filename2;



      if(!empty($name) && !empty($email) && !empty($phone))
      {
  
          $query = "insert into student1 (student_name,email,phone, photo, signature) values ('$name','$email','$phone', '$filename1', '$filename2')";
    
          mysqli_query($con, $query);

          move_uploaded_file($tempname1, $folder1);
          move_uploaded_file($tempname2, $folder2);

          // Now let's move the uploaded image into the folder: image
          // if (move_uploaded_file($tempname1, $folder1) && move_uploaded_file($tempname2, $folder2))  
          //   {
          //     $msg = "Data & Image uploaded successfully";
          //   }
          //   else{
          //       $msg = "Failed to upload image";
          //   }
      }else
      {
        echo "Please enter some valid information!";
      }

      echo $msg;
    }

?>


<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet"
		type="text/css"
		href="style.css" />
</head>

<body>
	<div id="content">

		<form method="POST" action="" enctype="multipart/form-data">
			<input type="file" name="photo" value="" /> <br>
      <input type="file" name="signature" value="" />
			<div>
				<button type="submit" name="submit">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>