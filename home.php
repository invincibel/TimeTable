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
        <title>Home</title>
	    <link rel="icon" href="logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
        <style>
            body {margin: 0;
            overflow-x: hidden;}

ul.topnav {
    list-style-type: none;
    position: fixed;
    z-index: 100;
    width:100%;
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
            #bottom{
                background-color: #333;
                position: fixed;
                bottom: 0%;
                width: 100%;
                height: 12%;
                z-index: 100;
                color: white;
                border-bottom-color: black;
                display: inline-flex;
            }
            i{
                color: white;
                padding: 1em 5px;
                font-size: 30px;
                position: relative;
            }
            .same{
                position: relative;
                left: 65%;
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
            #mypls{
                height: 200%;
            }
        </style>
    </head>
    <body>
        <ul class="topnav">
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="profile.php">profile</a></li>
  <li><a href="table.php">My Time Table</a></li>
  <li><a href="test.php">Upcoming tests</a></li>
  <li ><a href="http://hritikagg.rf.gd">About Us</a></li>
<li ><a href="add.php">Add Something</a></li>
<li class="right"><a href="logout.php">Logout</a></li>
</ul>
        
        <div id="bottom">
            <h3>Follow us on:</h3>       
            <a target="_blank" href="https://github.com/invincibel"><i class="fa fa-github" style="font-size:30px"></i></a>
			<a target="_blank" href="https://www.facebook.com/hritik.aggarwal.50"><i class="fa fa-facebook" style="font-size:30px"></i></a>
			<a target="_blank" href="https://www.instagram.com/hritik.aggarwal31/"><i class="fa fa-instagram" style="font-size:30px"></i></a>
			<a target="_blank" href="https://twitter.com/hritikaggarwa11"><i class="fa fa-twitter" style="font-size:30px"></i></a>
			<a target="_blank" href="https://api.whatsapp.com/send?phone=919149045778&text=hi"><i class="fa fa-whatsapp" style="font-size:30px"></i></a>
			<a target="_blank" href=""><i class="fa fa-snapchat" style="font-size:30px"></i></a>
            <p class="same">&copy;</p><h3 class="same">hritik aggarwal</h3>
        </div>
        <div id="mypls">
     <h2 style="font-family:'Bangers';font-size:2.5em;position:absolute;top:10%;left:40%;">Competitions</h2>
        <?php
        $a=$_SESSION['email'];
         $q="select * from competition where user='$a' ORDER BY date ASC,time ASC;";
        $query=mysqli_query($hritik,$q);
       $v=0;
        while($k=mysqli_fetch_array($query))
        {  
              echo "<div class='check' style='display:inline-flex;width:100%;position:relative;margin-top:10%;'><div id='box' style='width:33%;height:20em'><h3 align='center'>".$k['event']."</h3></div><h2 style='width:33%;position:relative;left:20%;'>".$k['date']."</h2><h1 style='color:white;position:relative%;margin-top:8%;float:right;'>Type:  ".$k['event']."</h1><p class='demo' style='position:relative;margin-top:13%;font-size:20px;margin-left:-40%;width:10em;'></p><a class='try' style='position:relative;margin-left:30%;;margin-top:15%;' href=check3.php?event=".$k['event']."&date=".$k['date']."&time=".$k['time'].">Delete</a></div>";
            $v++;
        }
        ?>
        </div>
        <?php
        $a=$_SESSION['email'];
         $q="select * from competition where user='$a' ORDER BY date ASC,time ASC;";
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
    if(minutes==30 && seconds==0)
        {
            
        }
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
        <script type="text/javascript">!function(t,e){"use strict";var r=function(t){try{var r=e.head||e.getElementsByTagName("head")[0],a=e.createElement("script");a.setAttribute("type","text/javascript"),a.setAttribute("src",t),r.appendChild(a)}catch(t){}};t.CollectId = "5aafcd9c0873d442245a01ec",r("https://s3.amazonaws.com/collectchat/launcher.js")}(window,document);</script>
    </body>
</html>
