<?php

session_start();
if(!isset($_SESSION['sellerlogin']) || $_SESSION['sellerlogin']!=true){
    echo "log in first";
    header('location:sellerlogin.php');
    exit;
}
include 'connection.php';
// require 'http://localhost/admin/partials/_navadmin.php' ;
?>

<html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FC-MEDS Seller</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">

	</script>
    <style>
        .desp{
        margin-top: 3%;
        color: rgb(50, 50, 80);
        }
        .wels{
        margin-top: 2%;
        text-align: center;
        }
        .welcome2{
        color: rgb(170, 159, 159);
        }
        .welcome2:hover{
        color: rgb(106, 177, 106);
        }
        .bills{
        margin-left: 10px;
        margin-top: 3%;
        }
        .invents{
          margin-left:10px;
          margin-top:4%;
          margin-bottom:3%;
        }
    </style>
</head>

<body>
	<!-- Nav bar template is used from bootstrap ref: https://getbootstrap.com/docs/5.0/components/navbar/ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/webproj/homepage.php">FC-MEds</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#miss">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#serv">Services</a>
        </li>
      </ul>
    </div>
    <button class="btn btn-outline-warning  my-2 my-sm-0" ><a style="color:white;" href="http://localhost/webproj/admin/sellerinfo.php"><b>Update Login Info</b></a></button>
    <button class="btn btn-outline-danger my-2 my-sm-0"><a style="color:white;" href="http://localhost/webproj/admin/sellerlogin.php"><b>Log Out</b></a></button>
  </div>
</nav>
<div class="wels">
  <h2 class="welcome">Welcome to FC-Meds</h2>
  <p class="welcome2">A helpful tool at your Service.</p>
</div>
<div class="bills">
  <h4 class="op">Oders Placed by Users</h4>
  <form method="post"> 
    <input type="submit" value="Show Orders" class="btn btn-success" name="dones">
  </form>
  <div class="col-lg-12 m-auto align-items-center">
    <?php
    $html='<table class="table" id="medshow"  >
    <tr style="background-color:khaki">
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <!-- <th scope="col">Price</th> -->
      <th scope="col">Quantity</th>
      <!-- <th scope="col">Date</th> -->
    </tr>';
    $invoice='<a href="http://localhost/webproj/client/invoice.php" target="_blank" class="btn btn-success">Get Invoice</a> <br></br>';
    $invoice2='<br>
    <div class="corder">
    <h5">Do you want to clear the Order?</h5>
    <form method="post">
        <input type="Submit" value="Cancel Order" class="btn btn-warning" name="indone">
    </form><br></div>';
    if(isset($_POST['dones'])){
    $perma="SELECT * FROM `orders` ";
    $permq=mysqli_query($con,$perma);
    if (mysqli_num_rows($permq) > 0) {
      echo $html;
        while($ro = mysqli_fetch_assoc($permq)) {
        echo
        "<tr>
        <td>"
        .$ro['medname'].
        "</td>
        <td>"
        .$ro['medtype'].
        "</td>
        <td>"
        .$ro['quantity'].
        "</td>
        </tr>";
                }
        echo "</table>";
        echo $invoice;
        echo $invoice2; 
        }
        else{
          echo "Currently No orders Placed!";
        }
         
        }
    ?>
    </div>
</div>
<?php
if(isset($_POST['indone'])){
  $return="SELECT medname, quantity from orders";
  $runr=mysqli_query($con,$return);
  while($rowsd=mysqli_fetch_assoc($runr)){
    // echo $rowsd['name'];
    $quano=$rowsd['quantity'];
    $nameo=$rowsd['medname'];
    $q="UPDATE medicines SET quantity = quantity+ $quano WHERE medname like '%".$nameo."%'";
    $r=mysqli_query($con,$q);
  }
//   $rows=mysqli_fetch_all($runr, MYSQLI_ASSOC);
// print_r($rows);
  $quer2="DELETE FROM orders";
  $runs2=mysqli_query($con,$quer2);
  $url1=$_SERVER['REQUEST_URI'];
  header("Refresh: 5; URL=$url1");
}
?>
<div class="invents">
  <h4>Check inventory</h4>
  <a href="http://localhost/webproj/client/meds.php" class="btn btn-success" target="_blank">Show Inventory</a>';
</div>
<hr/>
<!-- Footer -->
<footer class="page-footer font-small teal pt-4">

  <!-- Footer Text -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 id="miss" class="text-uppercase font-weight-bold">Our Mission</h5>
        <p>By Love Serve One another</p>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-6 mb-md-0 mb-3">

        <!-- Content -->
        <h5 id="serv" class="text-uppercase font-weight-bold">Services</h5>
        <p>Place your Order and we will provide you with your meds at your doorstep</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Text -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright:
    <a href="#">WebProj Group-5</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>

</html>