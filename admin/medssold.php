<?php

session_start();

if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    echo "log in first";
    header('location:adminlogin.php');
    exit;
}

include "connection.php";

echo"Total Meds Sold:::"
?>