<?php
include 'connection.php';
session_start();
$a=$_SESSION['email'];
$b=$_GET['event'];
$e=$_GET['date'];
$w=$_GET['time'];
$q="DELETE FROM `competition` WHERE user ='$a' and event='$b' and date='$e' and time='$w';";
$query=mysqli_query($hritik,$q);
header("location:home.php");
?>