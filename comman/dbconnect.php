<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn1 = mysqli_connect($servername, $username, $password);
$conn = '';
// Check connection
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check database it exist or not
mysqli_query($conn1, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'mydb'");

$sql2 = "CREATE DATABASE IF NOT EXISTS mydb";
// Create databse if not exist
$check=mysqli_query($conn1, $sql2);
mysqli_close($conn1);

if (!$check) {
  echo "Error creating database: " . mysqli_error($conn1);   
}
//  Create connection again with dbname
$conn = mysqli_connect($servername, $username, $password, 'mydb');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// table for guests
mysqli_query($conn, "SELECT * 
FROM information_schema.tables
WHERE table_schema = 'mydb' 
    AND table_name = 'myguest'
LIMIT 1;");



  $sql = "CREATE TABLE IF NOT EXISTS `mydb`.`myguest` (`srn` INT(20) NOT NULL AUTO_INCREMENT , `fname` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL ,`passwd` VARCHAR(255) NOT NULL , `tdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`srn`))";
  if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
  }


//table for enquiry


 mysqli_query($conn, "SELECT * 
FROM information_schema.tables
WHERE table_schema = 'mydb' 
    AND table_name = 'enquiry'
LIMIT 1;");

  $sql = "CREATE TABLE IF NOT EXISTS `mydb`.`enquiry` (`srn` INT(20) NOT NULL AUTO_INCREMENT ,`enqNum` VARCHAR(20) NOT NULL,`quotNum` VARCHAR(20) NOT NULL, `cname` VARCHAR(50) NOT NULL ,`carea` VARCHAR(50) NOT NULL ,`fname` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `phone` VARCHAR(50) NOT NULL , `tdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `quotDate` DATETIME NOT NULL,`poDate` DATETIME NOT NULL,`estatus` VARCHAR(50) NOT NULL ,`polength` VARCHAR(50) NOT NULL,`pobreadth` VARCHAR(50) NOT NULL,`quotAmount` VARCHAR(50) NOT NULL,`poAmount` VARCHAR(50) NOT NULL,`generatedby` VARCHAR(50) NOT NULL,`QuotGeneratedby` VARCHAR(50) NOT NULL ,`doneBy` VARCHAR(50) NOT NULL,`file_address` VARCHAR(250) NOT NULL ,`file_address_po` VARCHAR(250) NOT NULL,`file_name_po` VARCHAR(50) NOT NULL, PRIMARY KEY (`srn`))";
  if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
  }

?>