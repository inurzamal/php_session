<?php 
session_start();

	include("connection.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted


		$name = $_POST['name'];
		$email = $_POST['email'];

        $_SESSION["name"] = $name ;
        $_SESSION["email"] = $email;

        header("Location: form2.php");

	}
?>


<html>
<body>

<form action="" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>