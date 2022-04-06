<?php
$nameempty="";
$phoneempty="";

session_start();

if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    echo "log in first";
    header('location:adminlogin.php');
    exit;
}
 include 'connection.php';

 if(isset($_POST['done'])){

 $id = $_GET['id'];

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
if (empty($_POST["name"])) {
  //storing error message in $fnameempty
  $nameempty = "Seller Name required";
}
if (empty($_POST["phoneno"])) {
  //storing error message in $fnameempty
  $phoneempty = "Seller Phone no required";
}
    $row1_c1 = test_input($_POST['name']);
    $row1_c3 = test_input($_POST['phoneno']);
    $row1_c4 = test_input($_POST['email']);
    if (strlen($row1_c1) && strlen($row1_c3) && strlen($row1_c4) >0){ 
 $q = "UPDATE `seller` SET `username` = 
 '$row1_c1', 
 `phoneno` = '$row1_c3', 
 `email` = '$row1_c4'
  WHERE `id` = $id ";

 $query = mysqli_query($con,$q);
 header('location:adminseller.php');
 }
 }
?>

<!DOCTYPE html>
<html>
<head>
 <title>Seller Update</title>
 <style>
.t {
  
  border-collapse: collapse;
 
                    
}
.card{
  margin-top: 0%;
 
  text-align:center;
                
  color:green;
  text-decoration:none;
            }
.card:hover{
            color:black;
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
</head>
<body>
<?php require 'partials/_navadmin.php' ?>
<div class="card">
 
 <div class="card-header ">
 <h1>  Update Seller </h1>
 </div>
 </div>
 <br>
 <div class="col-lg-12 m-auto">
 
 <form method="post">
 <br>
 <div class="card-header m-auto col-lg-8 bg-warning" syle="margin:1%;">
 <h1 class=" text-center">  
 <table class="m-auto">
    <tr>
    <td class="text-center text-black">Name</td>
    <td class="text-center text-black">Phone no</td>
    <td class="text-center text-black">Email</td>
   
   </tr>
   <!--creating rows to get input from the user --->
   <tr>
     <td><input type="text"  name = "name" class = "col-lg-12 text-center rounded-pill" ></td>
     <td><input type="number"  name = "phoneno" class = "col-lg-12 text-center rounded-pill"  ></td>
     <td><input type="text"  name = "email" class = "col-lg-12 text-center rounded-pill"  ></td>
     
   </tr>
   <tr>
    <td class="text-center text-danger">
    <?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($nameempty){
                        echo $nameempty;
  
                        }

                        ?>
    </td>
    <td class="text-center text-danger">
    <?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($phoneempty){
                        echo $phoneempty;
  
                        }

                        ?>
    </td>
    <td class="text-center text-black"> </td>
   
   </tr>
   
</table>
<br></br>
  <button class="btn btn-dark col-lg-3 m-auto" type="submit" name="done"> Update </button><br>

 </div>
  </div>
 </form>
</body>
</html>