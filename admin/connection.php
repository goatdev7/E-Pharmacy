<?php
$servername = "localhost";
  
  $username = "root";
//password
  $password = "";
  //database name
  $database = "project_db";
  //connecting
  $con = mysqli_connect($servername,$username,$password,$database); 
 
//if connection not succesfull
if (!$con){
        //die
die('Could not connect: ' .
mysqli_error());
}

  ?>