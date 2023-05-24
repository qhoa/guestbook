<?php
	$dbhost=getenv('DB_HOST'); //Add your SQL Server host here
	$dbuser=getenv('DB_USER'); //SQL Username
	$dbpass=getenv('DB_PASS'); //SQL Password
	$dbname=getenv('DB_NAME'); //SQL Database Name
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if($mysqli->connect_errno ) {
		printf("Connect failed: %s<br />", $mysqli->error);
		exit();
	 }
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$sql="INSERT INTO guestbook(name,email,message) VALUES('$name','$email','$message')";
	if (!$mysqli->query($sql))
	{
		die('Error: ' . $mysqli->connect_error);
	}
	else
		echo "Values Stored in our Database!";
	$mysqli->close();
?>