<?php

include '..\connection.php';
print_r($_POST);
?>
<?php
//   if(!empty($_POST['items'])){
//     $iter=$_POST['items'];
//     echo $iter;
//   }
  if (!empty($_POST['morder'])&& !empty($_POST['morder2']) && isset($_POST['checkout'])){
    // if(isset($_POST['checkout'])){
    $nameo=$_POST['morder'];
    $quano=$_POST['morder2'];
    // this querry will copy the details of medicine whose order is placed
    $ques="INSERT INTO `orders` (name,type, price,quantity,company,OrderDate) 
    SELECT name, type, price,($quano), companyname,CURRENT_TIMESTAMP  FROM `notes` WHERE name LIKE
    '%".$nameo."%'" ;
    $send=mysqli_query($con,$ques);
    //This query will change the quantity of placed order item
    $ques3="UPDATE notes SET quantity = quantity- $quano WHERE name like '%".$nameo."%'";
    $send3=mysqli_query($con,$ques3);
    //This query is for testing purpose
    $ques2="SELECT * From `notes` where name like '%".$nameo."%'";
    // $send2=mysqli_query($con,$ques2);
    // while($ro = mysqli_fetch_assoc($send2)) {
    //     echo $ro['quantity'];
    // }
    echo "<script>alert('Keep entering Products you want to BUY');</script>";
    }
  ?>