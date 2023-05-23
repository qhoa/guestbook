<?php
	$host=getenv('DB_HOST'); //Add your SQL Server host here
	$user=getenv('DB_USER'); //SQL Username
	$pass=getenv('DB_PASS'); //SQL Password
	$dbname=getenv('DB_NAME'); //SQL Database Name
	$con=mysqli_connect($host,$user,$pass,$dbname);
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT name,message FROM guestbook");
	while($row = mysqli_fetch_array($result))
	{ ?>
	<h3><?php echo $row['name']; ?></h3>
    <p><?php echo $row['message']; ?></p>
	<?php } 
		mysqli_close($con);
?>
