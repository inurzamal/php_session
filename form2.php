<?php 
session_start();

	include("connection.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted

        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $phone = $_POST['phone'];


		if(!empty($name) && !empty($email) && !empty($phone))
		{

            //save to database
            $query = "insert into student (student_name,email,phone) values ('$name','$email','$phone')";

            mysqli_query($con, $query);

		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<html>
<body>

<form action="" method="post">
Phone: <input type="text" name="phone"><br>
<input type="submit" value = "SUBMIT">
</form>

</body>
</html>