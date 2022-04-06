<?php
$showAlert="";
$showError="";
$nameempty="";
$passempty="";
$confirmpassempty="";
session_start();

if(!isset($_SESSION['sellerlogin']) || $_SESSION['sellerlogin']!=true){
    echo "log in first";
    header('location:sellerlogin.php');
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
    $password = test_input($_POST['password']);
    $confirmpassword = test_input($_POST['confirmpassword']);
    $exists=false;
    if (strlen($name) && strlen($password) && strlen($confirmpassword)>0){
    if(($password == $confirmpassword) && $exists==false){
		$id=$_SESSION['id'];
         $sql = "UPDATE `seller` SET `username` = '$name', `pass` = '$password' WHERE `id` = $id";
    //sql query
        $final=mysqli_query($con,$sql);
        if($final){
            
            $showAlert = " ";
        }
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
 <title>Update Login Info</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
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

  
  
</head>
<body>
<?php require 'partials/_navseller.php' ?>
<?php
if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Username and password is now changed
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
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
        <div class="container my-4 bg-danger" style="color:white;font-display:bold;padding:2%;">
            <h1 class="text-center" > Update Seller Log In Info</h1>
        </div>
            <form method="post">
                 <div class="card-header my-4 text-center bg-dark " style="color:white;font-display:bold;padding:5%;margin:5%;">
                
                    <div class="form-group">
                        <label for="username" class="text-center text-light col-lg-2 form-control-sm">Username</label>
                        <input input placeholder="Enter Username" type="text" class="col-lg-6 text-center form-control-sm"  id="username" 
                        name="username" >
                        
            
                    </div>
                    <?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($nameempty){
                        echo $nameempty;
  
                        }

                        ?>
                   
                    <div class="form-group">
                        <label for="password" class="text-center text-light col-lg-2 form-control-sm">Password</label>
                        <input input placeholder="Enter Password" type="password" class="col-lg-6 text-center form-control-sm"  id="password" 
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
                        <input input placeholder="Confirm Password" type="password" class="col-lg-6 text-center form-control-sm"  id="confirmpassword" 
                        name="confirmpassword"> <small  class="form-text text-light">Make sure to type the same password</small>
            
                    
                    
                        
                     </div>
                     <?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($confirmpassempty){
                        echo $confirmpassempty;
  
                        }
                        echo "<br>";
                        ?>
                    
                     <button class="btn btn-success col-lg-4 mr-0" type="submit" name="done">Update Login Info </button>
                </div>
 
            </form>
        
    
    </div>

</body>
</html>


