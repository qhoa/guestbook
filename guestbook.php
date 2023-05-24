<?php
	$dbhost=getenv('DB_HOST'); //Add your SQL Server host here
	$dbuser=getenv('DB_USER'); //SQL Username
	$dbpass=getenv('DB_PASS'); //SQL Password
	$dbname=getenv('DB_NAME'); //SQL Database Name
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if($mysqli->connect_errno ) {
		printf("Connect failed: %s<br />", $mysqli->connect_error);
		exit();
	 }
//	 printf('Connected successfully.<br />');
	$result = $mysqli->query("SELECT name,message FROM $dbname");
	while($row = $mysqli->fetch_array($result))
	{ ?>
	<h3><?php echo $row['name']; ?></h3>
    <p><?php echo $row['message']; ?></p>
	<?php } 
		$mysqli->close();
?>