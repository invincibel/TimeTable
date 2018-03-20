<?php
include 'connection.php';
session_start();
$a=$_SESSION['email'];
$b=$_GET['start'];
$e=$_GET['end'];
$w=$_GET['work'];
$q="DELETE FROM `time` WHERE name='$a' and start='$b' and end='$e';";
$query=mysqli_query($hritik,$q);
header("location:table.php");
?>