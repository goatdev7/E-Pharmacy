<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-pill">
  <a class="navbar-brand" href="http://localhost/webproj/homepage.php">FC-Meds</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href="adminmed.php">Medicines <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="adminseller.php">Seller Info <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="addadmin.php">Admin Info <span class="sr-only">(current)</span></a>
      </li>
    </ul>
   
   
    <form action="admininfo.php" class="form-inline my-2 my-lg-0">
   
   <button class="btn btn-outline-warning  my-2 my-sm-0" ><a style="color:white;" href="admininfo.php"><b>Update Login Info</b></a></button>
 </form>
    <form action="adminlogout.php" class="form-inline my-2 my-lg-0">
   
      <button class="btn btn-outline-danger my-2 my-sm-0"><a style="color:white;" href="adminlogout.php"><b>Log Out</b></a></button>
    </form>
  </div>
</nav>
<?php
// if(isset($_POST['sold'])){
//   echo "<script>alert('Toal Meds Sold are: ')</script>";
// }
?>