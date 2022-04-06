<?php
$incorrect=FALSE;
$required=FALSE;
$empty=FALSE;
$nameempty="";
$passempty="";
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
    $empty=TRUE;
    $nameempty = "Username is required";
  }
  if (empty($_POST["password"])) {
    //storing error message in $fnameempty
    $passempty = "Password is required";
  }
    
    include 'connection.php';
    $username= test_input($_POST['username']);
    $password= test_input($_POST['password']);
    if (strlen($username) && strlen($password)>0){
    $sql="SELECT * FROM `sellerlogin` WHERE username = '$username' AND pass = '$password'";
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result) == 1) {
        
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $username;
        if(isset($_SESSION['username'])){
        header('location:.\bill.php');
        }
    }
    else{
        $incorrect = TRUE;
    }
}
else{
    $required = TRUE;
}
}    

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<style>
    body {
  background-color: #b3b3b3;
}
</style>
    <title>Login</title>

  </head>
  <body>
    <?php require 'http://localhost/admin/partials/_nav.php' ?>
    <?php if($incorrect){
  //   echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  //   <strong>Invalid!</strong> Username Or Password
  //   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>×</span>
  //   </button>
  // </div>";
  }?>
  <?php if($required){
  //   echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  //   <strong>Error!</strong> Username And Password is required
  //   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>×</span>
  //   </button>
  // </div>";
  }?>
    <div class="dom">
        <div class="container my-4 bg-dark" style="color:white;font-display:bold;padding:2%;">
            <h1 class="text-center">Admin Login to FCC Meds</h1>
        </div>
            <form method="post">
                 <div class="card-header my-4 text-center bg-dark " style="color:white;font-display:bold;padding:5%;margin:5%;">
                
                    <div class="form-group">
                        <label for="username" class="text-center text-light col-lg-2 form-control-sm">Username</label>
                        <input input placeholder="Enter Username" type="text" class="col-lg-6 text-center form-control-sm"  id="username" 
                        name="username">
                        
            
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
                        echo "<br>";
                        }

                        ?>
                     <button class="btn btn-primary col-lg-4 mr-0" type="submit" name="done"> Log In </button>
                     <br></br>
                     <small class="form-text text-light">If already not a user Sign Up</small>
                     
                     <button class="btn btn-outline-warning text-light col-lg-4 mr-0"><a href=".\adminsignup.php" target="_blank"> Sign Up</a> </button>
                </div>
            </form>
        
    
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  </body>
</html>