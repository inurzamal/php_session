<?php 
session_start();

	include("connection.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted


        $phone = $_POST['phone'];

		$_SESSION["phone"] = $phone;

		header("Location: form3.php");

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