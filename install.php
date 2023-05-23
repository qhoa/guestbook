<?php
$host=getenv('DB_HOST'); //Add your SQL Server host here
$user=getenv('DB_USER'); //SQL Username
$pass=getenv('DB_PASS'); //SQL Password
$dbname=getenv('DB_NAME'); //SQL Database Name
$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
// Create database
if (mysql_query("CREATE DATABASE $dbname",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
// Create table
mysql_select_db($dbname, $con);
$sql = "CREATE TABLE guestbook
(
id int(5) NOT NULL auto_increment,
name varchar(60) NOT NULL default ' ',
email varchar(60) NOT NULL default ' ',
message text NOT NULL,
Primary key(id)
)";
// Execute query
mysql_query($sql,$con);
mysql_close($con);
?>