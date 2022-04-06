
<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    echo "log in first";
    header('location:adminlogin.php');
    exit;
}
include 'connection.php';

$id = $_GET['id'];

$q = " DELETE FROM `medicines` WHERE id = $id ";

mysqli_query($con, $q);

header('location:adminmed.php');

?>

