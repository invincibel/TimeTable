<?php
 include 'connection.php';
  session_start();
  if(!isset($_SESSION['email']))
  {
      echo "pls login first";
      header("refresh:2;url=index.php");
      exit();
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Your Time Table</title>
            <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>
                <link rel="icon" href="logo.png">
        <style>
                        body {margin: 0;}
            #upper{
                display: inline-flex;
            }
ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: darkgrey;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px){
    ul.topnav li.right, 
    ul.topnav li {float: none;}
}
            table{
                position: relative;
                left: 5%;
                margin-top: 5%;
                width: 90%;
                height: 10em;
            }
            td{
                position: relative;
            }
            
        </style>
    </head>
    <body>
             <ul class="topnav">
  <li><a href="home.php">Home</a></li>
  <li><a href="profile.php">profile</a></li>
  <li><a class="active" href="table.php">My Time Table</a></li>
  <li><a href="test.php">Upcoming tests</a></li>
  <li ><a href="http://hritikagg.rf.gd">About Us</a></li>
<li ><a href="add.php">Add Something</a></li>
<li class="right"><a href="logout.php">Logout</a></li>

</ul>
        <h1 align="center" style="font-family:'Amita'"> Here is Your Time Table...</h1>
        <div id="upper">
            <font style="font-text:'Audiowide';color:darkgrey;position:relative;left:30%;font-size:30px;"><?php 
                $a=$_SESSION['email'];
                      $q="select * from user where email='$a';";
                      $query=mysqli_query($hritik,$q);
                  while($k=mysqli_fetch_array($query))
                      echo $k['name'];
                ?></font>
            <p id="demo" style="position:absolute;right:3%;"></p>
        </div>
        <div id="tab">
            <table border="1">
                <tr>
                    <th>Begining</th>
                    <th>End</th>
                    <th>Work</th>
                </tr>
                
                <?php
                 $a=$_SESSION['email'];
                      $q="select * from time where name='$a';";
                $query=mysqli_query($hritik,$q);
                while($k=mysqli_fetch_array($query))
                {
                    
                    echo "<tr><td style='width=100%;'>".$k['start']."</td><td>".$k['end']."</td><td>".$k['work']."<a style='float:right;' href=check.php?start=".$k['start']."&end=".$k['end']."&work=".$k['work'].">Delete</a></td></tr>";
                }
                    ?>
               
            </table>
            
        </div>
       <script>
var myVar = setInterval(function(){ myTimer() }, 1000);

function myTimer() {
    var d = new Date();
    var t = d.toLocaleTimeString();
    document.getElementById("demo").innerHTML = t;
}
</script>
    </body>
</html>