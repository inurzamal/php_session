<?php
session_start();

include("connection.php");

  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['submit'])) {

    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
      $folder = "image/".$filename;



      if(!empty($name) && !empty($email) && !empty($phone))
      {
  
          $query = "insert into student (student_name,email,phone, filename) values ('$name','$email','$phone', '$filename')";
    
          mysqli_query($con, $query);

          // Now let's move the uploaded image into the folder: image
          if (move_uploaded_file($tempname, $folder))  
            {
              $msg = "Data & Image uploaded successfully";
            }
            else{
                $msg = "Failed to upload image";
            }
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
			<input type="file" name="uploadfile" value="" />

			<div>
				<button type="submit" name="submit">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>