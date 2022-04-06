<?php
session_start();
if(!isset($_SESSION['sellerlogin']) || $_SESSION['sellerlogin']!=true){
    echo "log in first";
    header('location:sellerlogin.php');
    exit;
}
// include 'connection.php';
include '..\admin\connection.php';
 require '..\admin\partials\_navsell.php' 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FC-MEDs Inventory</title>
        <style>
            .wel{
                /* display:inline-flex; */
                text-align:center;
                margin-top:2%;
                border:3px solid khaki;
                border-radius: 50px;
                
                /* background-color:khaki; */
                /* left:10%; */
            }
            .wel2{
                text-align:center;
                
                color:grey;
                text-decoration:none;
            }
            .wel2:hover{
                color:plum;
            }
            .quant{
                /* color:green; */
                font-display:bold;
                font-size:20px;
                position: relative;
                font-weight:500;
                left:38%;
                top:2%;

            }
            .comp{
                /* color:#FCC133; */
                font-display:bold;
                font-size:20px;
                position: relative;
                left:38%;
                font-weight:500;
                top:2%;

            }
            .med{
                position: relative;
                left:38%;
                /* font-family:Arial; */
                font-display:bold;
                font-size:20px;
                font-weight:500;
                /* color:#FCC133; */
                top:2%;
            }
            .rounded-pill{
                position: relative;
                left:38%;
                top:2%;    
            }
            .btn-success{
                position: absolute;
                left:45%;
                top:60%;
            }
            .invent{
                font-family:Arial;
                text-align:Center;
                font-display:bold;
                font-weight:600;
                /* color:#CAE7DF; */
                margin-top:3%;
                margin-bottom:3%;
                text-decoration:underline;
            }
            .invent:hover{
                color:grey;
                font-size:22px;
            }
            body{
                background-image:url("http://localhost/webproj/client/invent.png");
                background-size: cover;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="col-lg-12 m-auto align-items-center">
        <h1 class="wel"> Welcome to FC-MEDs Inventory</h1>
        <h4 class="wel2">A helpful tool at your service.</h4>
        <br>
        <h5 class="invent">Inventory Search</h5>
        <form method='post'>
        <label class="med">Search Medicine Details</label><br>
        <input type="text" placeholder="Medicine Name..." name= "medname" class = "col-lg-3 col-sm-3 col-xs-3 rounded-pill" >
       <!-- <br> -->
        <!-- <button class="btn btn-success col-lg-0.5 m-auto" type="submit" id="cls" name="done" onclick="myfunc()"> Submit </button><br> -->
    </form>
    <!-- <button onClick="toggleTable()">Open Table</button> -->
    
    <?php
    $html='<table class="table" id="medshow" class="hidden" >
    <tr style="background-color:khaki;">
        <!-- <br> -->
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Useage</th>
      <th scope="col">Comapny Name</th>
      <th scope="col">Dose</th>
      <!-- <th scope="col">Update</th>
      <th scope="col">Delete</th> -->
    </tr>';
    // $perma="SELECT * FROM `notes` ";
    // $permq=mysqli_query($con,$perma);
    // if (mysqli_num_rows($permq) > 0) {
    //     while($ro = mysqli_fetch_assoc($permq)) {
    //     echo 
    //     "<tr>
    //     <td>"
    //     .$ro['name'].
    //     "</td>
    //     <td>"
    //     .$ro['type'].
    //     "</td>
    //     <td>"
    //     .$ro['description'].
    //     "</td>
    //     <td>"
    //     .$ro['price'].
    //     "</td>
    //     <td>"
    //     .$ro['quantity'].
    //     "</td>
    //     <td>"
    //     .$ro['useability'].
    //     "</td>
    //     <td>"
    //     .$ro['companyname'].
    //     "</td>
    //     <td>"
    //     .$ro['dose'].
    //     "</td>
    //     </tr>";
    //             }
    //     // echo "</table>";
    //         }

    ?>
<!-- Query to highlight the medicines searched -->
    <?php
    if(!empty($_POST['medname'])){
        $medsearch = $_POST['medname'];
        // echo $medsearch;
        $sql="SELECT * FROM `medicines` WHERE medname LIKE '%".$medsearch."%'";
        $final=mysqli_query($con,$sql);
        if (mysqli_num_rows($final) > 0) {
            echo $html;
            while($row = mysqli_fetch_assoc($final)) {
            echo
            "<br><tr style='background-color:yellow;'>
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
            </tr>";
                    }
            echo "</table>";
            }
            else{
                echo "<script>alert('$medsearch'+' Medicines are not available in stock right now.')</script>";
            }
        }
    ?>
    <form method="post">
        <br>
    <label class="quant">Check Availability</label><br>
    <input type="text" placeholder="Search medicine..." name = "medquant" class = "col-lg-3 col-sm-3 col-xs-3 rounded-pill" ><br>
    </form>
    <form method="post">
        <br>
    <label class="comp">Company Meds</label><br>
    <input type="text"  placeholder="Enter Company..." name = "compname" class = "col-lg-3 col-sm-3 col-xs-3 rounded-pill" ><br>
    </form>
    <?php
    if(isset($_POST['medquant'])){ 
        $medsearch2 = $_POST['medquant'];
        // echo $medsearch2;
        $sql2="SELECT quantity FROM `medicines` WHERE medname LIKE '%".$medsearch2."%'";
        $final2=mysqli_query($con,$sql2);
        if (mysqli_num_rows($final2) > 0) {
            while($row2 = mysqli_fetch_assoc($final2)) {
                // echo '<script>alert("Available Quantity of '$medsearch2' is :  '$row2['quantity']'  Packets.")</script>';
                // echo "";
                $new=$row2['quantity'];
                echo "<script>alert('$new'+' Packets in Stock');</script>";
            }
        }
    }
    ?>
    <?php
    if(!empty($_POST['compname'])){
        $medsearch3 = $_POST['compname'];
        // echo $medsearch3;
        $sql3="SELECT * FROM `medicines` WHERE companyname LIKE '%".$medsearch3."%'";
        $final3=mysqli_query($con,$sql3);
        if (mysqli_num_rows($final3) > 0) {
            echo $html;
            while($row3 = mysqli_fetch_assoc($final3)) {
                echo 
                "<br><tr style='background-color:grey;'>
                <td>"
                .$row3['medname'].
                "</td>
                <td>"
                .$row3['medtype'].
                "</td>
                <td>"
                .$row3['meddescription'].
                "</td>
                <td>"
                .$row3['price'].
                "</td>
                <td>"
                .$row3['quantity'].
                "</td>
                <td>"
                .$row3['useability'].
                "</td>
                <td>"
                .$row3['companyname'].
                "</td>
                <td>"
                .$row3['dose'].
                "</td>
                </tr>";
                        }
                echo "</table>";
                }
                else{
                    echo "<script>alert('$medsearch3'+' Medicines not available in stock right now.')</script>";
                }
                }
    ?>
    <!-- </table> -->
      </div>
    </body>
    <script>
        // const element = document.getElementById("cls");
        // element.addEventListener("click", myFunction);
        // function myfunc(){
        //    var show= document.getElementById("medshow");
        // SELECT quantity, CASE WHEN quantity >0 THEN 'The Quantity is Greater than 0' ELSE 'The Quantity is less than 0' END AS QuantityText FROM notes
        //    show=show.style.visibility="visible";
        // }
    </script>
    </html>