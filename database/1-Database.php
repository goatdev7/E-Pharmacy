<?php
//we will first connect to local server and create a database and tables
//servername
$server = "localhost";
//username
$username = "root";
//password
$password = "";
//connection to the server
$con = mysqli_connect($server,$username,$password); 
//if connection not succesfull
if (!$con){
  //die
  die('Could not connect: ' .
mysqli_error());
}
//else saving the query to make database in variable $sql
$sql = "CREATE DATABASE project_db";
//executing sql query to make database mustafa_db
if (mysqli_query($con,$sql)){
  echo "Database project_db created"."<br>";
}
// if there is some error
else{
  echo "Error creating database:" .
mysqli_error();
}
// Creating Table products for task 1 in the data base
$sql = "CREATE TABLE `project_db`.`medicines` ( `id` INT NOT NULL AUTO_INCREMENT ,  `medname` VARCHAR(50) NOT NULL ,  `medtype` VARCHAR(50) NOT NULL ,  `meddescription` VARCHAR(200) NOT NULL ,  `price` INT(50) NOT NULL ,  `quantity` INT(200) NOT NULL ,  `useability` VARCHAR(200) NOT NULL ,  `companyname` VARCHAR(50) NOT NULL ,  `dose` INT(20) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
//executing sql query
    mysqli_query($con,$sql);
    echo "Table medicines created in project_db"."<br>";
$sql1 = "CREATE TABLE `project_db`.`users` ( `id` INT NOT NULL AUTO_INCREMENT ,  `username` VARCHAR(255) NOT NULL ,  `pass` VARCHAR(10) NULL DEFAULT NULL , `phoneno` INT(11) NOT NULL ,   PRIMARY KEY  (`id`)) ENGINE = InnoDB";
    //executing sql query
        mysqli_query($con,$sql1);
        //query to add default admin login info
        $info="INSERT INTO `project_db`.`users` 
        (`username`, `pass`, `phoneno`) VALUES 
        ('admin', 'admin', '123')";
        mysqli_query($con,$info);
        echo "Information was added in users";
        echo "Table users created in project_db"."<br>";
$sql2 = "CREATE TABLE `project_db`.`seller` ( `id` INT NOT NULL AUTO_INCREMENT ,  `username` VARCHAR(255) NOT NULL ,  `pass` VARCHAR(10) NULL DEFAULT NULL ,  `phoneno` INT(11) NOT NULL ,  `email` VARCHAR(255) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
        //executing sql query
            mysqli_query($con,$sql2);
            echo "Table selles created in project_db"."<br>";
$sql3 = "CREATE TABLE `project_db`.`orders` ( `id` INT NOT NULL AUTO_INCREMENT ,  `medname` VARCHAR(50) NOT NULL ,  `medtype` VARCHAR(50) NOT NULL , `price` INT(50) NOT NULL ,  `quantity` INT(200) NOT NULL ,  `companyname` VARCHAR(50) NOT NULL, `date` TIMESTAMP NOT NULL, PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
        //executing sql query
        mysqli_query($con,$sql3);
        echo "Table orders created in project_db"."<br>";      
$sql4 = "CREATE TABLE `project_db`.`invoices` ( `id` INT NOT NULL AUTO_INCREMENT ,  `medname` VARCHAR(50) NOT NULL ,  `medtype` VARCHAR(50) NOT NULL , `price` INT(50) NOT NULL ,  `quantity` INT(200) NOT NULL ,  `companyname` VARCHAR(50) NOT NULL, `date` TIMESTAMP NOT NULL, PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
        //executing sql query
        mysqli_query($con,$sql4);
        echo "Table invoices created in project_db"."<br>"; 
?>