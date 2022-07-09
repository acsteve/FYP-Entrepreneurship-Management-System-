<?php 

session_start();
include ("connection.php");        

error_reporting(0);

$rn=$_GET['rn'];

$_SESSION['userid']=$rn;

echo $_SESSION['userid'];

header("Location:adminactivity.php");
?>