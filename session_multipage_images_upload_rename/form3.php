<?php
session_start();

include("connection.php");

  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['submit'])) {

    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];


    $counter = 1;
    $target_dir = "uploads/";
    $target_file1 = $target_dir . basename($_FILES["photo"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["signature"]["name"]);
  
    // $filename1 = $_FILES["photo"]["name"];
    // $tempname1 = $_FILES["photo"]["tmp_name"];
    // $folder1 = "image/".$filename1;


    // $filename2 = $_FILES["signature"]["name"];
    // $tempname2 = $_FILES["signature"]["tmp_name"];    
    // $folder2 = "image/".$filename2;



      if(!empty($name) && !empty($email) && !empty($phone))
      {
  
          $query = "insert into student1 (student_name,email,phone, photo, signature) values ('$name','$email','$phone', '$target_file1', '$target_file2')";
    
          mysqli_query($con, $query);

        //   move_uploaded_file($tempname1, $folder1);
        //   move_uploaded_file($tempname2, $folder2);

        if (file_exists($target_file1)) {
            $exists = true;
            $increment = $target_dir .$counter.basename($_FILES["photo"]["name"]);
            while($exists){
               if(file_exists($increment)){
                  $counter++;
               }
               else{
                  $exists = false;
               }
             }
             move_uploaded_file($_FILES["photo"]["tmp_name"], $increment );
             $msg = "Form Submitted Successfully!";
         }
         else {
          move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file1);
          $msg = "Form Submitted Successfully!";
         }

         if (file_exists($target_file2)) {
            $exists = true;
            $increment = $target_dir .$counter.basename($_FILES["signature"]["name"]);
            while($exists){
               if(file_exists($increment)){
                  $counter++;
               }
               else{
                  $exists = false;
               }
             }
             move_uploaded_file($_FILES["signature"]["tmp_name"], $increment );
             $msg = "Form Submitted Successfully!";
         }
         else {
          move_uploaded_file($_FILES["signature"]["tmp_name"], $target_file2);
          $msg = "Form Submitted Successfully!";
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
			<input type="file" name="photo" value="" /> <br>
      <input type="file" name="signature" value="" />
			<div>
				<button type="submit" name="submit">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>