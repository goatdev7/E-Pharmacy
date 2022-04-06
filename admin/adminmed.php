<?php
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

$insertion = false;
include "connection.php";

if(isset($_POST['done'])){
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
  $nameempty = "Medicine Name required";
}
if (empty($_POST["price"])) {
  //storing error message in $fnameempty
  $priceempty = "Price required";
}
if (empty($_POST["quantity"])) {
  //storing error message in $fnameempty
  $quantityempty = "Quantity required";
}
if (empty($_POST["companyname"])) {
  //storing error message in $fnameempty
  $companynameempty = "CompanyName required";
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
    $sql = "INSERT INTO `medicines`  (`medname`, `medtype`, `meddescription`, `price` , `quantity`, `useability`, `companyname`, `dose`) VALUES 
    ('$row1_c1', '$row1_c2 ', '$row1_c3', '$row1_c4',
    '$row2_c1', '$row2_c2 ', '$row2_c3', '$row2_c4')
    
    ";
    //sql query
  $final=mysqli_query($con,$sql);
  if($final){
    $insertion = true;
  }
}
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>Medicine Information</title>
 <style>
.t {
  
  border-collapse: collapse;
 
                    
}
.card{
  margin-top: 0%;
 
  text-align:center;
                
  color:white;
  text-decoration:none;
            }
.card:hover{
            color:brown;
            }

.alert{
  height: 8%;
}
a:link {
  color: white;
}
a:active {
  color: black;
} 
a:hover {
  color: black;
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
<?php
if($insertion){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Medicine has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
 
 

 <div class="card col-lg-12 my-3">
 
 <div class="card-header bg-success ">
 <h1>  Insert Medicine </h1>
 </div>
 </div>
 
 <div class="col-lg-12 m-auto">
 
 <form method="post">
 <div class="card-header bg-dark">
 <h1 class=" text-center">  

 <table class="text-light">
 <div  class="t" >
    <tr>
    <td class="text-center text-light">Name</td>
    <td class="text-center text-light">Type</td>
    <td class="text-center text-light">Description</td>
    <td class="text-center text-light">Price</td>
    <td class="text-center text-light">Quantity</td> 
    <td class="text-center text-light">Useage</td>
    <td class="text-center text-light">Comapny Name</td>
    <td class="text-center text-light">Dose</td>
   </tr>
   </div>
   <!--creating rows to get input from the user --->
   <tr>
     <td><input type="text text-light"  name = "name" class = "col-lg-12 text-center" >
     
     <td><input type="text"  name = "type"class = "col-lg-12 text-center" ></td>
     <td><input type="text"  name = "description" class = "col-lg-12 text-center" ></td>
     <td><input type="number" step="0.01" min="0" max="1000" name = "price" class = "col-lg-12 text-center" >
     <td><input type="number"  name = "quantity" class = "col-lg-12 text-center"></td>
     <td><input type="text"  name = "useage"class = "col-lg-12 text-center" ></td>
     <td><input type="text"  name = "companyname" class = "col-lg-12 text-center">
     
    </td>
     <td><input type="number"  name = "dose" class = "col-lg-12 text-center"></td>
   </tr>
   
   <tr>
    <td class="text-center text-danger"><?php
                        //printing error message if something else instead of letters or whitespaces used
                        if($nameempty){
                        echo $nameempty;
  
                        }

                        ?>
                        </td>
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
  <button class="btn btn-primary col-lg-2 m-auto" type="submit" name="done"> Add </button><br>
  <button class="btn btn-success col-lg-2 m-auto" name="sales" style="items">Check Sales</button>
   </h1>
 </div>
  </div>
 </form>
 <hr/>
 <h4 class="text-center">Medicine Stock</h4>
 <table class="table" >
  <thead>
  <tr style="background-color:khaki;">
  <th scope="col">Sr no</th>
    <th scope="col">Name</th>
    <th scope="col">Type</th>
    <th scope="col">Description</th>
    <th scope="col">Price</th>
    <th scope="col">Quantity</th>
    <th scope="col">Useage</th>
    <th scope="col">Comapny Name</th>
    <th scope="col">Dose</th>
    <th scope="col">Edit</th>
    <th scope="col">Delete</th>
</tr>
</thead>
<tbody>


<?php 
        
        include 'connection.php'; 
      
            // sql query to get content where dept no is 57 or 63 
            $display="SELECT * FROM `medicines`";
            $display1 = mysqli_query($con,$display);
            //checking the length of our rows
            if (mysqli_num_rows($display1) > 0) {
              //fetching data and printing
               while($row = mysqli_fetch_assoc($display1)) {
               
                
echo "<tr >
<td >". $row['id'] . "</td>
<td>"

.$row['medname'].
"</td>
<td>"
.$row['medtype'].
"</td>
<td>"
.$row['meddescription'].
"</td>
<td>"
.$row['price'].
"</td>
<td>"
.$row['quantity'].
"</td>
<td>"
.$row['useability'].
"</td>
<td>"
.$row['companyname'].
"</td>
<td>"
.$row['dose'].
"</td>

<td>
 <button type ='button' class='btn btn-primary' data-toggle='modal'><a  style='color:white;'href='adminupdate.php?id=".$row['id']."'>
 Edit</a></button> 
</td>
<td>
<button class='btn btn-danger'><a href='admindelete.php?id=".$row['id']."'>
Delete</a></button>  
 </td>
</tr>";
    }

  }
  $tab="
  
  <table class='table'>
  <tr style='background-color:plum;'>
  <th scope='col'>Sr no</th>
    <th scope='col'>Name</th>
    <th scope='col'>Type</th>
    <th scope='col'>Price</th>
    <th scope='col'>Quantity</th>
    <th scope='col'>Date</th>
</tr>
<hr/>
<h4 class='text-center' style='color:navyblue;'>History of Sales Today</h4>
"; 
if(isset($_POST['sales'])){
  $sales="SELECT * FROM `invoices` WHERE DATE(`date`) = CURDATE()";
  $sends=mysqli_query($con,$sales);
  $number=mysqli_num_rows($sends);
  // print_r($number);
  if ($number>0){
    echo "<script>alert('Number of Sales Today: '+'$number')</script>";
    echo $tab;
    while($ro=mysqli_fetch_assoc($sends)){
      echo "<tr '> 
      <td >". $ro['id'] . "</td>
      <td>".$ro['medname']."</td>
      <td>".$ro['medtype']."</td>
      <td>".$ro['price']."</td>
      <td>".$ro['quantity']."</td>
      <td>".$ro['date']."</td>
    </tr>";

    }
  }
  // echo "<script>alert('Number of Sales Today: '+'$number')</script>";
}
?>
                      
            
</tbody>
</body>
</html>