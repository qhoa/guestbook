<html>
   <head>
      <title>Creating MySQL Database & Table</title>
   </head>
   <body>
      <?php
         $dbhost = getenv('DB_HOST');
         $dbuser = getenv('DB_USER');
         $dbpass = getenv('DB_PASS');
         $dbname = getenv('DB_NAME');
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass);
         
         if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->error);
            exit();
         }
         printf('Connected successfully.<br />');
         if ($mysqli->query("CREATE DATABASE $dbname")) {
            printf("Database $dbname created successfully.<br />");
         }
         if ($mysqli->errno) {
          printf("Could not create database: %s<br />", $mysqli->error);
         }
         
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
         $sql = "CREATE TABLE guestbook( ".
            "id int(5) NOT NULL auto_increment, ".
            "name varchar(60) NOT NULL default ' ', ".
            "email varchar(60) NOT NULL default ' ', ".
            "message text NOT NULL, ".
            "Primary key(id)); ";
         if ($mysqli->query($sql)) {
            printf("Table guestbook created successfully.<br />");
         }
         if ($mysqli->errno) {
            printf("Could not create table: %s<br />", $mysqli->error);
         }
         $mysqli->close();
      ?>
   </body>
</html>