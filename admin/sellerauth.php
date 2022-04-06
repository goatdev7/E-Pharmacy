<?php
$showError="";
$nameempty="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
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
  
  include 'connection.php';
    $name = $_POST['username'];
    
    $exists=false;
    
      //$password = md5($password);
      //$confirmpassword = md5($confirmpassword);
      if (strlen($name)>0){
      $sql="SELECT * FROM `seller` WHERE username = '$name'";
      $result=mysqli_query($con,$sql);
      if (mysqli_num_rows($result) == 1) {
    //sql query
        
        
    session_start();
    $row = mysqli_fetch_assoc($result);
    $_SESSION['auth1'] = true;
    $_SESSION['id'] = $row['id'];
    

    header('location:sellersignup.php');
    
           
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
 <title>Authentication</title>
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
        <strong>Error!</strong> You are not allowed to create account at time.Please Contact fccmeds@fccollege.edu.pk
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    
  ?>
 
 

 <div class="dom">
        <div class="container my-4 " style="color:black;font-display:bold;padding:2%;">
            <h1 class="text-center">Authentication for Seller Signup</h1>
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
                   
                   
                    
                     <button class="btn btn-success col-lg-2 mr-0" type="submit" name="done"> Check Authentication </button>
                </div>
 
            </form>
            
    
    </div>

</body>
</html>


