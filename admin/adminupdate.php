<?php
$name="";
$nameempty="";
$priceempty="";
$quantityempty="";
$companynameempty="";

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
  $nameempty = "Medicine name is required";
}
if (empty($_POST["price"])) {
  //storing error message in $fnameempty
  $priceempty = "price is required";
}
if (empty($_POST["quantity"])) {
  //storing error message in $fnameempty
  $quantityempty = "quantity is required";
}
if (empty($_POST["companyname"])) {
  //storing error message in $fnameempty
  $companynameempty = "Companyname is required";
}
    $row1_c1 = test_input($_POST['name']);
    $row1_c2 = test_input($_POST['type']);
    $row1_c3 = test_input($_POST['description']);
    $row1_c4 = test_input($_POST['price']);
    $row2_c1 = test_input($_POST['quantity']);
    $row2_c2 = test_input($_POST['useage']);
    $row2_c3 = test_input($_POST['companyname']);
    $row2_c4 = test_input($_POST['dose']);
    
    if (strlen($row1_c1) && strlen($row1_c2) && strlen($row1_c3) && strlen($row1_c4) && strlen($row2_c1) && strlen($row2_c2) && strlen($row2_c3) && strlen($row2_c4) >0){
 $q = "UPDATE `medicines` SET `medname` = 
 '$row1_c1', 
 `medtype` = '$row1_c2', 
 `meddescription` = '$row1_c3', 
 `price` = '$row1_c4', 
 `quantity` = '$row2_c1', 
 `useability` = '$row2_c2', 
 `companyname` = '$row2_c3', 
 `dose` = '$row2_c4' WHERE `id` = $id ";

 $query = mysqli_query($con,$q);

 header('location:adminmed.php');
 }
}

?>

<!DOCTYPE html>
<html>
<head>
 <title>Update Medicine</title>
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
 <h1>  Update Medicine </h1>
 </div>
 </div>
 <br>
 <div class="col-lg-12 m-auto">
 
 <form method="post">
 <div class="card-header bg-warning">
 <h1 class=" text-center">  

 <table>
 <div  class="t" >
    <tr>
    <td class="text-center text-dark">Name</td>
    <td class="text-center text-dark">Type</td>
    <td class="text-center text-dark">Description</td>
    <td class="text-center text-dark">Price</td>
    <td class="text-center text-dark">Quantity</td> 
    <td class="text-center text-dark">Useage</td>
    <td class="text-center text-dark">Comapny Name</td>
    <td class="text-center text-dark">Dose</td>
   </tr>
   </div>
   <!--creating rows to get input from the user --->
   <tr>
     <td><input type="text"  name = "name" class = "col-lg-12 text-center" value=<?php echo $name;?>></td>
     <td><input type="text"  name = "type"class = "col-lg-12 text-center" ></td>
     <td><input type="text"  name = "description" class = "col-lg-12 text-center" ></td>
     <td><input type="number" step="0.01" min="0" max="1000" name = "price" class = "col-lg-12 text-center" ></td>
     <td><input type="number"  name = "quantity" class = "col-lg-12 text-center"></td>
     <td><input type="text"  name = "useage"class = "col-lg-12 text-center" ></td>
     <td><input type="text"  name = "companyname" class = "col-lg-12 text-center"></td>
     <td><input type="number"  name = "dose" class = "col-lg-12 text-center"></td>
   </tr>
   <tr>
   <tr>
    <td class="text-center text-danger"><?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($nameempty){
                        echo $nameempty;
  
                        }

                        ?></td></td>
    <td class="text-center text-light"> </td>
    <td class="text-center text-light"> </td>
    <td class="text-center text-danger"><?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($priceempty){
                        echo $priceempty;
  
                        }
                        
                        ?></td>
    <td class="text-center text-danger"><?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($quantityempty){
                        echo $quantityempty;
  
                        }
                        
                        ?></td> 
    <td class="text-center text-light"> </td>
    <td class="text-center text-danger"><?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($companynameempty){
                        echo $companynameempty;
  
                        }
                        
                        ?></td>
    <td class="text-center text-light"> </td>
   </tr>
</table>

<br></br>
  <button class="btn btn-dark col-lg-2 m-auto" type="submit" name="done"> Update </button><br>
   </h1>
 </div>
  </div>
 </form>
</body>
</html>