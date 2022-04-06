<?php
$nameempty="";
$showError="";
$passempty="";
$confirmpassempty="";
session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth']!=true){
    echo "log in first";
    header('location:adminlogin.php');
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //function for cleaning data
function test_input($data) {
    //triming the data
    $data = trim($data);
    //stripslashing data
    $data = stripslashes($data);
    //converting special characters
    $data = htmlspecialchars($data);
    //returning clean data
    return $data;
  }
  if (empty($_POST["username"])) {
    //storing error message in $fnameempty
    $nameempty = "Username is required";
  }
  if (empty($_POST["password"])) {
    //storing error message in $fnameempty
    $passempty = "Password is required";
  }
  if (empty($_POST["confirmpassword"])) {
    //storing error message in $fnameempty
    $confirmpassempty = "Password is required";
  }

  include 'connection.php';
    $name = test_input($_POST['username']);
    $phoneno = test_input($_POST['phoneno']);
    $password = test_input($_POST['password']);
    $confirmpassword = test_input($_POST['confirmpassword']);
    $exists=false;
    if (strlen($name) && strlen($password) && strlen($confirmpassword)>0){
      //$password = md5($password);
      //$confirmpassword = md5($confirmpassword);
    if(($password == $confirmpassword) && $exists==false){
      $id=$_SESSION['id'];
         $sql = "UPDATE `users` SET `username` = '$name', `pass` = '$password', `phoneno` = '$phoneno' WHERE `id` = $id";
    //sql query
        $final=mysqli_query($con,$sql);
        header('location:adminlogin.php');
         
    }
    else{
            $showError = " ";
        }
     
}
}      
?>

<!DOCTYPE html>
<html>
<head>
 <title></title>
 <style>
table, th, td {
  
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
.card{
  margin-top: 0%;
 
  text-align:center;
                
  color:black;
  text-decoration:none;
            }
.card:hover{
            color:blue;
            }

.alert{
  height: 8%;
}


</style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <style>
    body {
  background-color: #b3b3b3;
}
</style>
</head>
<body>
<?php require 'partials/_nav.php' ?>
<?php

    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>Passwords Do not match
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
  ?>
 
 

 <div class="dom">
        <div class="container my-4 bg-primary" style="color:white;font-display:bold;padding:2%;">
            <h1 class="text-center">Admin Sign up to FCC Meds </h1>
        </div>
            <form method="post">
                 <div class="card-header my-4 text-center bg-dark " style="color:white;font-display:bold;padding:5%;margin:5%;">
                
                 <div class="form-group">
                        <label for="username" class="text-center text-light col-lg-2 form-control-sm">Username</label>
                        <input type="text" placeholder="Enter Name" class="col-lg-6 text-center form-control-sm"  id="username" 
                        name="username">
                        
            
                    </div>
                    <?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($nameempty){
                        echo $nameempty;
  
                        }

                        ?>
                   <div class="form-group">
                        <label for="phoneno" class="text-center text-light col-lg-2 form-control-sm">Phone No</label>
                        <input type="text" placeholder="Enter Phone No" class="col-lg-6 text-center form-control-sm"  id="phoneno" 
                        name="phoneno">
                        
            
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-center text-light col-lg-2 form-control-sm">Password</label>
                        <input placeholder="Enter Password" type="password" class="col-lg-6 text-center form-control-sm"  id="password" 
                        name="password">
            
                
                        
                    </div>
                    <?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($passempty){
                        echo $passempty;
  
                        }

                        ?>
                    <div class="form-group">
                        <label for="confirmpassword" class="text-center text-light col-lg-2 form-control-sm">Confirm Password</label>
                        <input placeholder="Confirm Password" type="password" class="col-lg-6 text-center form-control-sm"  id="confirmpassword" 
                        name="confirmpassword"> <small  class="form-text text-light">Make sure to type the same password</small>
            
                    
                    
                        
                     </div>
                     <?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($confirmpassempty){
                        echo $confirmpassempty;
  
                        }
                        echo "<br>";
                        ?>
                    
                     <button class="btn btn-success col-lg-4 mr-0" type="submit" name="done"> Sign Up </button>
                </div>
 
            </form>
        
    
    </div>

</body>
</html>


