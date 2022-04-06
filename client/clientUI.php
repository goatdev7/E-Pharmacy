<html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FC-MEDs User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

	</script>
	<!-- <link rel="stylesheet" href="clientP.css"> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">

	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">

	</script>
  <style>
    
.wel{
  text-align: center;
}
.desp{
  text-align: center;
  color: grey;
}
.desp:hover{
  color: khaki;
}
.nav-link{
  margin-left: 10px;
}
.cart{
  padding-left: 30%;
}
#cls{
  /* height: 1%; */
  width: 10%;
}
.orders{
  margin-left: 10px;
}
.slider{
  display: flex;

  /* background-color: yellow; */
}
.prods{
  margin-left:10px;
  
  /* padding-right: 20px; */
}
.pros{
  border: 1px solid rgb(226, 243, 126);
  border-radius: 30px;
  margin-left: 50px;
}
.plab{
   margin-left: 60px;
}
.plab2{
  margin-left: 170px;
}
.plab3{
  margin-left: 75px;
}
.plab4{
  margin-left: 95px;
}
.labels{
  margin-top: 10px;
  display: flex;
  /* background-color: rgb(238, 238, 147); */
}
.ord1:hover{
  display:flex;
  color:khaki;
}
.pro2{
  padding-left:3px;
}
.final{
  margin-left: 10px;
}
  </style>
</head>

<body>
	<!-- Nav bar template is used from bootstrap ref: https://getbootstrap.com/docs/5.0/components/navbar/ -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="http://localhost/webproj/homepage.php">FC-Meds</a>
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
          <a class="nav-link " href="#serv" tabindex="-1" aria-disabled="true" >Services</a>
        </li>
       </ul>
      <form class="d-flex" method="post">
        <input class="form-control me-2" type="search" name="searchmed"placeholder="Search Medicines.." aria-label="Search">
        <!-- <button class="btn btn-outline-success" type="submit" name="searchmed2">Search</button> -->
      </form>
      <?php
      include '..\admin\connection.php';
      if(isset($_POST['searchmed'])){
        $inq=$_POST['searchmed'];
        // echo $inq;
        $search="SELECT medname, quantity FROM `medicines` where medname LIKE '%".$inq."%'";
        $next=mysqli_query($con,$search);
        if (mysqli_num_rows($next)==0){
          echo "<script>alert('Sorry, ' +'$inq'+' is out of Stock.');</script>";
        }
        else{
          while($data = mysqli_fetch_assoc($next)) {
            $new=$data['quantity'];
            $new2=$data['medname'];
            if($new>1){
              echo "<script>alert('$new2'+' is in Stock. You can Place Order');</script>";
            }
            else{
              echo "<script>alert('Sorry, ' +'$new2'+' is out of Stock.');</script>";
            }
            
        }
      }

  }
      ?>
       
    </div>
  </div>
</nav><div class="container">
  <div class="row">
    <div class="col">
      <br>
      <h1 class="wel">Welcome to FC-MEDs</h1>
      <p class="desp">A helpful tool at your service.
      </p>
      <!-- <h5 class="pop"> Popular Products</h5> -->
      </div>
  </div>
</div>
<div class="prods">
  <h5 class="pop"> Popular Products</h5>
  <div class="slider">
    <!-- <img class="pros" src="panadol.png" alt="Panadol img" height="250" width="270"> -->
    <?php
   echo "<img class='pros' src='http://localhost/webproj/client/panadol.png' alt='Panadol img' height='250' width='270'>"; 
  
    echo "<img class='pros'  src='http://localhost/webproj/client/cac100.png' alt='Cac-100 img' height='250' width='250'>";
    echo "<img class='pros' src='http://localhost/webproj/client/mwash.jpg' alt='Listerine MW img' height='250' width='250'>";
    echo "<img class='pros' src='http://localhost/webproj/client/joharj.png' alt='Johar-Joshanda img' height='250' width='350'>";
    ?>
  </div>
  <div class="labels">
    <div class="lab1">
    <h6 class="plab">Panadol 500 mg Pack</h6>
    <p class="plab">Tablets</p>
    </div>
    <div class="lab2">
    <h6 class="plab2">CaC-1000 Plus Orange 1 x 20's</h6>
    <p class="plab2">Tablet effervescent</p>
    </div>
    <div class="lab3">
    <h6 class="plab3">Listerine Mouth Wash 200 ml</h6>
    <p class="plab3">Liquid</p>
    </div>
    <div class="lab4">
    <h6 class="plab4">Johar Joshanda Pack</h6>
    <p class="plab4">Packet</p>
    </div>
  </div>
  </div>
  <br></br>
  <div class="orders">
  <h5 class="ord1">Place your Order <?php 
    echo "<img class='pro2' src='http://localhost/webproj/client/cart.png' alt='Cart img' height='30' width='30'>";?>
  </h5>
  <!-- <form method="post">
    <input type="text" name="items" placeholder="Number of Items?" class = "col-lg-3 col-sm-3 col-xs-3">
  </form> -->
  <div id="show_alert"></div>
  <div id="oitem">
    <form method="post" id="itemform">
      <input type="text" name="morder" placeholder="Enter medicine..." class = "col-lg-3 col-sm-3 col-xs-3" required>
      <input type="number" name="morder2" placeholder="Enter Quantity..." class = "col-lg-3 col-sm-3 col-xs-3" required>
      <button class="btn btn-success col-lg-0.5 col-xs-0.5 m-auto add_item" type="submit" id="cls" name="odone">Add</button>
    </form>
    <!-- <h4 class="cout">Are you done with your order?</h4>
    <button class="btn btn-outline-success col-lg-0.5 col-xs-0.5 m-auto" id="add_btn"name="checkout">Checkout</button> -->
  </div>
  </div>
 
  <?php
$ochecks=' <div class="final">
<h4 class="cout">Are you done with your order?</h4>
<form method="post">
<!-- <button class="btn btn-success col-lg-1 col-xs-0.5 m-auto checks"  name="checkout">Checkout</button><br></br> -->
<!-- <a href="..\invoice.php" class="btn btn-success" target="_blank" >Get Invoice</a> -->
<input type="Submit" class="btn btn-Success  col-lg-1" value="Checkout" name="checkout">
</form>
</div>';
  if (!empty($_POST['morder'])&& !empty($_POST['morder2']) && isset($_POST['odone'])){
    $nameo=$_POST['morder'];
    $quano=$_POST['morder2'];
    $find="SELECT medname,quantity From medicines Where medname Like '%".$nameo."%'";
    $runfind=mysqli_query($con,$find);
    // print_r($runfind);
    if(mysqli_num_rows($runfind)==0){
      echo "<script>alert('Sorry, Your Order cannot be Placed. Medicine is not in stock')</script>";
     }
    while($dats=mysqli_fetch_assoc($runfind)){
      if ($dats['quantity']==0){
        echo "<script>alert('Sorry, Your Order cannot be Placed. Medicine is not in stock')</script>";
      }
      else{
         // this querry will copy the details of medicine whose order is placed
        $ques="INSERT INTO `orders` (medname,medtype, price,quantity,companyname,date) 
        SELECT  medname, medtype, price,($quano), companyname,CURRENT_TIMESTAMP  FROM `medicines` WHERE medname LIKE
        '%".$nameo."%'" ;
        $send=mysqli_query($con,$ques);
        // mysqli_autocommit($con, False);
        //This query will change the quantity of placed order item
        $ques3="UPDATE medicines SET quantity = quantity- $quano WHERE medname like '%".$nameo."%'";
        $send3=mysqli_query($con,$ques3);
        echo "<script>alert('Keep entering Products you want to BUY');</script>";
        echo $ochecks;
        }
      }
    }

    if(isset($_POST['checkout'])){
      echo "<script>alert('Your Order has been Placed. Seller will contact you with an Invoice')</script>";
    }
  ?>

  <?php
  // $nexthtml=' <div class="finals" style="margin-left:10px;">
  // <form method="post"><a href="..\invoice.php" class="btn btn-success" target="_blank" >Get Invoice</a>
  // <input type="Submit" class="btn btn-warning  col-lg-1" value="Cancel" name="cancel">
  // </form>
  // </div>';
  // if(isset($_POST['checkout'])){
  //   echo "<script>
  //   $(document).ready(function(){
  //     $(document).on('click','.checks',function(e){
  //       e.preventDefault();
  //     });
  //     </script>";
  //   echo $nexthtml;
  // }
  // if (isset($_POST['cancel'])){
  //   mysqli_rollback($con);
  //   $q="SELECT * from notes";
  //   $r=mysqli_query($con,$q);
  //   $r2=mysqli_fetch_all($r, MYSQLI_ASSOC);
  //   print_r($r2);

  // }
  ?>
  <br>
  <br></br>
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
    <a href="#">WebProj</a>
  </div>
  <!-- Copyright -->

  </footer>
  <!-- Footer -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script>
    $(document).ready(function(){
      // alert('Hello')
      $(".add_item").click(function(e){
        e.preventDefault();
        $("#oitem").prepend(`  <div id="oitem" class="append_item">
    <form method="post" id="itemform">
      <input type="text" name="morder[]" placeholder="Enter medicine..." class = "col-lg-3 col-sm-3 col-xs-3">
      <input type="number" name="morder2[]" placeholder="Enter Quantity..." class = "col-lg-3 col-sm-3 col-xs-3">
      <button class="btn btn-danger col-lg-0.5 col-xs-0.5 m-auto remove_item" type="submit" id="cls" name="odone">Remove</button>
    </form>
  </div>`);
      });
      $(document).on('click','.remove_item',function(e){
        e.preventDefault();
        let row=$(this).parent();
        $(row).remove();
      });
      $("#itemform").submit(function(e){
        e.preventDefault();
        $("#add_btn").val('Adding...')
        $$.ajax({
          url:'action.php',
          method:'post',
          data:$(this).serialize(),
          success:function(response){
            console.log(response);
            // $("#add_btn").val('Checkout');
            // $("#itemform")[0].reset();
            // $(".append_item").remove();
            // $("#show_alert").html(`<div class="alert alert-success" role="alert">${response}</div>`)
          }
        });
      });
    });
  </script> -->
  </body>

</html>