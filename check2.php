<?php
include 'connection.php';
session_start();
$a=$_SESSION['email'];
$b=$_GET['subject'];
$e=$_GET['date'];
$w=$_GET['time'];
$q="DELETE FROM `test` WHERE user='$a' and subject='$b' and date='$e' and time='$w';";
$query=mysqli_query($hritik,$q);
header("location:test.php");
?>