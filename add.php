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
        <title>Add Something</title>
        <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
        <style>
            body {margin: 0;}

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
 .dropbtn {
    background-color:darkgrey;
     position: relative;
     left: 5%;
  width: 90%;
     color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}
            table{
                position: absolute;
                left: 5%;
                width: 90%;
                height: auto;
                margin-top: 4%;
                
            }
.dropdown {
    position: relative;
    display: inline-block;
    width: 100%;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    width: 90%;
    left: 5%;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: gray;
}
.take{
  width: 100%;
    height: 2em;
}
            #add{
                width: 100%;
                height: 2em;
                background-color: gainsboro;
            }
            #add:hover{
                cursor: pointer;
                background-color: gray
            }
            #time,#test,#competitions{
                visibility: hidden;
            }
        </style>
    </head>
    <body>
              <ul class="topnav">
  <li><a href="home.php">Home</a></li>
  <li><a href="profile.php">profile</a></li>
  <li><a href="table.php">My Time Table</a></li>
  <li><a href="test.php">Upcoming tests</a></li>
  <li ><a href="http://hritikagg.rf.gd">About Us</a></li>
<li ><a class="active" href="add.php">Add Something</a></li>
<li class="right"><a href="logout.php">Logout</a></li>
</ul>
            <h1 align="center" style="font-family:'Amita'"> What do you Want To Do?...</h1>
            <div class="dropdown">
  <button class="dropbtn">Select Your Choice...</button>
  <div class="dropdown-content">
      <a onclick="makeFirstVisible()">Add into Time Table</a>
    <a onclick="makeSecondVisible()">Add a test</a>
    <a onclick="makeThirdVisible()">Add a competition details</a>
  </div>
</div><br><br>
     <div id="time">
    <form method="post">
  <table border="1">
    <tr>
        <th>Begining</th>
        <th>End</th>
        <th>Work You want to do</th>
    </tr>
      <tr>
          <td>
               <input class="take" type="time" name="begin">
          </td>
          <td>
              <input class="take" type="time" name="end">
          </td>
          <td>
              <input class="take" type="text" name="work">
          </td>
      </tr>
      <tr>
          <td colspan="3"> <input type="submit" value="Add" name="add" id="add"></td>
      </tr>
  </table>
</form>     
    </div>
        <div id="test">
<form method="post">
  <table border="1">
    <tr>
        <th>Subject</th>
        <th>Chapter</th>
        <th>Date</th>
        <th>Time</th>
    </tr>
      <tr>
          <td>
               <input type="text" class="take" name="sub">
          </td>
          <td>
              <input type="text" class="take" name="chap">
          </td>
          <td>
              <input class="take" type="date" name="dat">
          </td>
          <td>
              <input class="take" type="time" name="tim">
          </td>
      </tr>
      <tr>
          <td colspan="4"> <input type="submit" value="Add" name="tesadd" id="add"></td>
      </tr>
  </table>
</form>
        </div>
        <div id="competitions">
            <form method="post">
  <table border="1">
    <tr>
        <th>Event</th>
        <th>Date</th>
        <th>Time</th>
    </tr>
      <tr>
          <td>
               <input type="text" class="take" name="event">
          </td>
          <td>
              <input class="take" type="date" name="evendate">
          </td>
          <td>
              <input class="take" type="time" name="eventime">
          </td>
      </tr>
      <tr>
          <td colspan="3"> <input type="submit" value="Add" name="evenadd" id="add"></td>
      </tr>
  </table>
</form>
        </div>
        <script>
            function makeFirstVisible(){
                var box1=document.getElementById('time');
                var box2=document.getElementById('test');
                var box3=document.getElementById('competitions')
                box1.style.visibility="visible";
                box2.style.visibility="hidden";
                box3.style.visibility="hidden";
            }
            function makeSecondVisible(){
                var box1=document.getElementById('time');
                var box2=document.getElementById('test');
                var box3=document.getElementById('competitions')
                box1.style.visibility="hidden";
                box2.style.visibility="visible";
                box3.style.visibility="hidden";
            }
            function makeThirdVisible(){
                var box1=document.getElementById('time');
                var box2=document.getElementById('test');
                var box3=document.getElementById('competitions')
                box1.style.visibility="hidden";
                box2.style.visibility="hidden";
                box3.style.visibility="visible";
            }
        </script>
    </body>
</html>
<?php
if(isset($_POST['add']))
{
    $a=$_SESSION['email'];
    $begin=$_POST['begin'];
    $end=$_POST['end'];
    $work=$_POST['work'];
    $q="INSERT INTO `time`(`name`, `start`, `end`, `work`) VALUES ('$a','$begin','$end','$work');";
    $query=mysqli_query($hritik,$q);
    if($query)
        echo "<script>alert('successfully added');</script>";
    else
        echo "<script>alert('something went wrong try again');</script>";
}
if(isset($_POST['tesadd']))
{
    $a=$_SESSION['email'];
    $b=$_POST['sub'];
    $c=$_POST['chap'];
    $d=$_POST['dat'];
    $e=$_POST['tim'];
    $q="INSERT INTO `test`(`user`, `subject`, `chapter`, `date`, `time`) VALUES ('$a','$b','$c','$d','$e');";
    $query=mysqli_query($hritik,$q);
    if($query)
        echo "<script>alert('successfully added');</script>";
    else
        echo "<script>alert('something went wrong try again');</script>"; 
}
if(isset($_POST['evenadd']))
{
    $a=$_SESSION['email'];
    $begin=$_POST['event'];
    $end=$_POST['evendate'];
    $work=$_POST['eventime'];
    $q="INSERT INTO `competition`(`user`, `event`, `date`, `time`) VALUES ('$a','$begin','$end','$work');";
    $query=mysqli_query($hritik,$q);
    if($query)
        echo "<script>alert('successfully added');</script>";
    else
        echo "<script>alert('something went wrong try again');</script>";
}
?>