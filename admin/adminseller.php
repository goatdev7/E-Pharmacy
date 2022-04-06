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
    $sql = "INSERT INTO `seller`  (`username`, `phoneno`, `email`) VALUES 
    ('$row1_c1', '$row1_c3', '$row1_c4')
    
    ";
    //sql query
  $final=mysqli_query($con,$sql);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>Seller Page</title>
 <style>
.t {
  
  border-collapse: collapse;
 
                    
}

.card:hover{
            color:red;
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
  <div class="col-lg-12 my-3">
 
 
 <div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Add Seller </h1>
 </div>
 <form method="post">
 <br>
 <div class="card-header m-auto col-lg-8 bg-success" syle="margin:1%;">
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
  <button class="btn btn-dark col-lg-3 m-auto" type="submit" name="done"> Submit </button><br>

 </div>
  </div>
 </form>
 </div>
 <table class="table m-auto text-center" >
  <thead>
  <tr >
  <th scope="col">Id</th>
    <th scope="col">Name</th>
    <th scope="col">Phone No</th>
    <th scope="col">Email</th>
    <th scope="col">Edit</th>
    <th scope="col">Delete</th>
</tr>
</thead>
<tbody>


<?php 
        
        include 'connection.php'; 
            // sql query to get content where dept no is 57 or 63 
            $display="SELECT * FROM `seller`";
            $display1 = mysqli_query($con,$display);
            //checking the length of our rows
            if (mysqli_num_rows($display1) > 0) {
              //fetching data and printing
               while($row = mysqli_fetch_assoc($display1)) {
                echo

"<tr >
<td>"
.$row['id'].
"</td>
<td>"
.$row['username'].
"</td>

<td>"
.$row['phoneno'].
"</td>
<td>"
.$row['email'].
"</td>
<td>
 <button class='btn btn-primary text-dark'><a style='text-decoration:none; color:yellow;' href='sellerupdate.php?id=".$row['id']."'>
 Edit</a></button> 
</td>
<td>
<button class='btn btn-danger text-dark'><a style='text-decoration:none;' href='sellerdelete.php?id=".$row['id']."'>
Delete</a></button>  
 </td>

</tr>";
}
echo "</table>";
             } ?>
                      
            
</tbody>
</body>
</html>