<?php
// http://localhost/webproj
include '.\admin\connection.php';
?>
<html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FC-MEDS Homepage</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

	</script>
	<link rel="stylesheet" href="welcome.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">

	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">

	</script>
    <style>
        .wels{
            margin-top: 2%;
            text-align: center;
        }
        .nav-item{
            margin-left:10px;
        }
        .nav-link:hover{
        color: khaki;
        }
        .welcome2{
        color: rgb(170, 159, 159);
        }
        .welcome2:hover{
        color: rgb(106, 177, 106);
        }
        .option{
        margin-left: 10px;
        text-align: center;
        }
        .desp{
        margin-top: 3%;
        color: rgb(50, 50, 80);
        }
        .pharm{
        align-items: center;
        }
    </style>
</head>

<body>
	<!-- Nav bar template is used from bootstrap ref: https://getbootstrap.com/docs/5.0/components/navbar/ -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">FC-MEds</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <!-- here we will conect admin log in -->
          <a class="nav-link" href='http://localhost/webproj/admin/adminlogin.php' target="_blank">Admin</a>
        </li>
        <li class="nav-item">
            <!-- here we will connect seller login file -->
          <a class="nav-link" href="http://localhost/webproj/admin/sellerlogin.php" target="_blank">Seller</a>
        </li>
        <li class="nav-item">
            <!-- here we will connect cleint login -->
          <a class="nav-link" href="http://localhost/webproj/client/clientUI.php" target="_blank">Client</a>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<div class="wels">
  <h2 class="welcome">Welcome to FC-Meds</h2>
  <p class="welcome2">A helpful tool at your Service.</p>
</div>
<div class="option">
  <!-- <h5 class="desp">We aim to buid a useful e-Pharmacy tool to facilitate our valued customers</h5> -->
  <?php
 echo  "<img class='pharm' src='http://localhost/webproj/client/pharm.png'>";
  ?>
  
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
  
  <!-- <div class="footer-copyright text-center py-3">Developed by:
    <b>Isaac Opher Ullah</b>
    <br><b>Ghulam Mustafa Bajwa</b>
    <br><b>Umama Rashid</b>
     <a href="#"></a> 
  </div> -->
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>

</html>