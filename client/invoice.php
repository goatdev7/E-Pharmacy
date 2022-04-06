<?php
// session_start();

// if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
//     echo "log in first";
//     // header('location:http://localhost/webproj/admin/sellerlogin.php');
//     exit;
// }
session_start();
if(!isset($_SESSION['sellerlogin']) || $_SESSION['sellerlogin']!=true){
    echo "log in first";
    header('location:http://localhost/webproj/admin/sellerlogin.php');
    exit;
}
include '..\admin\connection.php';
$sql="SELECT * from orders";
$run=mysqli_query($con,$sql);
$rows=mysqli_fetch_all($run, MYSQLI_ASSOC);
// print_r($rows);

$gt=0;
$i=1;
$html='<html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FC-MEDs Invoice</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">

	</script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">

	</script>
  <style>
  *{
      margin:5px;
  }
    h2{
      text-align:center;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .last{
        text-align:center;
    }

table{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td,th{
  border: 1px solid #444;
  padding: 8px;
  text-align: left;
}
.my-table{
  text-align: right;
}

  </style>
</head>

<body>
  <h2>Invoice</h2>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Item</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>';


  foreach($rows as $row){
        $html.='<tr>
        <td>'.$i.'</td>
        <td>'.$row['medname'].'</td>
        <td>'.number_format($row['price'],2) .'</td>
        <td>'.$row['quantity'].'</td>
        <td>'.number_format($row['price'] * $row['quantity']) .'</td>
      </tr>';
      $gt += $row['price']* $row['quantity'];
      $i++;

  }
  $html.=' </tbody>
  <tr >
    <th colspan="4" class="my-table">GST(17%)</th>
    <th> '.number_format(($gt*17)/100, 2) . '</th>  
  </tr>
    <tr >
    <th colspan="4" class="my-table">Grand Total</th>
    <th>'. number_format(round($gt+ ($gt*17)/ 100, 2)). '</th>  
  </tr>

</table>
<div class="last">
<form method="post">
<input type="submit" class="btn btn-success" name="done" value="Done">
</form>
</div>
</body>
</html>';
echo $html;
if(isset($_POST['done'])){
    $quer="INSERT INTO `invoices` (`medname`,`medtype`, `price`,`quantity`,`companyname`,`date`) 
    SELECT  `medname`, `medtype`, `price`,`quantity`, `companyname`,`date`  FROM `orders`";
    $runs=mysqli_query($con,$quer);
    $quer2="DELETE FROM orders";
    $runs2=mysqli_query($con,$quer2);
    // $url1=$_SERVER['REQUEST_URI'];
    header('location: http://localhost/webproj/admin/sellermain.php');
}
?>



 