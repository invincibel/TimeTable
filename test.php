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
        <title>Your Upcoming test</title>
        <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
                <link rel="icon" href="logo.png">
        <style>
              body {margin: 0;
            overflow-x: hidden;
            width: 100%;}
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
            #box{
                width: 33%;
                height: 20em;
                background-color: yellow;
            }
            .check{
                background-color: lightgrey;
            }
            .check:hover{
                background-color: darkgrey;
                cursor: inherit;
            }
        </style>
    </head>
    <body>
  <ul class="topnav">
  <li><a href="home.php">Home</a></li>
  <li><a  href="profile.php">profile</a></li>
  <li><a href="table.php">My Time Table</a></li>
  <li><a class="active" href="test.php">Upcoming tests</a></li>
  <li ><a href="http://hritikagg.rf.gd">About Us</a></li>
<li ><a href="add.php">Add Something</a></li>
<li class="right"><a href="logout.php">Logout</a></li>
</ul>       
        <h2 style="font-family:'Bangers';font-size:2.5em;position:relative;left:40%;">Recent Tests</h2>
        <?php
        $a=$_SESSION['email'];
         $q="select * from test where user='$a' ORDER BY date ASC,time ASC;";
        $query=mysqli_query($hritik,$q);
       $v=0;
        while($k=mysqli_fetch_array($query))
        {  
           if($k['subject']=='maths')
                echo "<div class='check' onclick='blurIt();' style='display:inline-flex;width:100%;'><img src='images/maths.jpg' style='width:33%;height:20em'><h2 style='width:33%;position:relative;left:20%;'>".$k['date']."</h2><h1 style='color:white;position:relative%;margin-top:8%;float:right;'>CHAPTER:  ".$k['chapter']."</h1><p class='demo' style='position:relative;margin-top:13%;font-size:20px;margin-left:-40%;width:10em;'></p><a class='try' style='position:relative;margin-left:30%;;margin-top:15%;' href=check2.php?subject=".$k['subject']."&date=".$k['date']."&time=".$k['time'].">Delete</a></div>";
           else if($k['subject']=='physics')
                echo "<div class='check' style='display:inline-flex;width:100%;'><img src='images/physics.jpg' style='width:33%;height:20em'><h2 style='width:33%;position:relative;left:20%;'>".$k['date']."</h2><h1 style='color:white;position:relative%;margin-top:8%;float:right;'>CHAPTER:  ".$k['chapter']."</h1><p class='demo' style='position:relative;margin-top:13%;font-size:20px;margin-left:-40%;width:10em;'></p><a class='try' style='position:relative;margin-left:30%;;margin-top:15%;' href=check2.php?subject=".$k['subject']."&date=".$k['date']."&time=".$k['time'].">Delete</a></div>";
            else if($k['subject']=='ece' || $k['subject']=='electronics')
                echo "<div class='check' style='display:inline-flex;width:100%;'><img src='images/ece.jpg' style='width:33%;height:20em'><h2 style='width:33%;position:relative;left:20%;'>".$k['date']."</h2><h1 style='color:white;position:relative%;margin-top:8%;float:right;'>CHAPTER:  ".$k['chapter']."</h1><p class='demo' style='position:relative;margin-top:13%;font-size:20px;margin-left:-40%;width:10em;'></p><a class='try' style='position:relative;margin-left:30%;;margin-top:15%;' href=check2.php?subject=".$k['subject']."&date=".$k['date']."&time=".$k['time'].">Delete</a></div>";
          else if($k['subject']=='eco')
                echo "<div class='check' style='display:inline-flex;width:100%;'><img src='images/eco.jpg' style='width:33%;height:20em'><h2 style='width:33%;position:relative;left:20%;'>".$k['date']."</h2><h1 style='color:white;position:relative%;margin-top:8%;float:right;'>CHAPTER:  ".$k['chapter']."</h1><p class='demo' style='position:relative;margin-top:13%;font-size:20px;margin-left:-40%;width:10em;'></p><a class='try' style='position:relative;margin-left:30%;;margin-top:15%;' href=check2.php?subject=".$k['subject']."&date=".$k['date']."&time=".$k['time'].">Delete</a></div>";
            else
                 echo "<div class='check' style='display:inline-flex;width:100%;'><div id='box' style='width:33%;height:20em'><h3 align='center'>".$k['subject']."</h3></div><h2 style='width:33%;position:relative;left:20%;'>".$k['date']."</h2><h1 style='color:white;position:relative%;margin-top:8%;float:right;'>CHAPTER:  ".$k['chapter']."</h1><p class='demo' style='position:relative;margin-top:13%;font-size:20px;margin-left:-40%;width:10em;'></p><a class='try' style='position:relative;margin-left:30%;;margin-top:15%;' href=check2.php?subject=".$k['subject']."&date=".$k['date']."&time=".$k['time'].">Delete</a></div>";
            $v++;
        }
        ?>
        <?php
        $a=$_SESSION['email'];
         $q="select * from test where user='$a' ORDER BY DATE ASC,time ASC;";
        $query=mysqli_query($hritik,$q);
        $i=0;
         while($k=mysqli_fetch_array($query))
        { 
        ?>
       <script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $k['date'].' '.$k['time'];?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementsByClassName("demo")["<?php echo $i ?>"].innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        var box= document.getElementsByClassName('check')["<?php echo --$v; ?>"];
               
        document.getElementsByClassName("demo")["<?php echo $i ?>"].innerHTML = "EXPIRED please remove";
    }
}, 1000);
</script>
        <?php    
$i++;
    if($i==1)
        break;
         }
        ?>
    </body>
</html>