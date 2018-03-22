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
        <title>Profile</title>
        <link rel="stylesheet" href="cssfiles/profile.css">
                <link rel="icon" href="logo.png">
        <style>
            input{
                width: 90%;
                position: relative;
                left: 5%;
                height: 2.5em;
                border: none;
                border-bottom: 2px solid skyblue;
            }
            #sub{
                width: 20%;
                left: 40%;
            }
            body {margin: 0;
            overflow-x: hidden;}

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
#upper{
    display: inline-flex;
}
        </style>
    </head>
    <body>
        <ul class="topnav">
  <li><a href="home.php">Home</a></li>
  <li><a class="active" href="profile.php">profile</a></li>
  <li><a href="table.php">My Time Table</a></li>
  <li><a href="test.php">Upcoming tests</a></li>
  <li ><a href="http://hritikagg.rf.gd">About Us</a></li>
<li ><a href="add.php">Add Something</a></li>
<li class="right"><a href="logout.php">Logout</a></li>

</ul>
        <div id ="upper" style="display:inline-flex;">
         <img src="upload/<?php
                      $a=$_SESSION['email'];
                      $q="select * from user where email='$a';";
                      $query=mysqli_query($hritik,$q);
                      while($k=mysqli_fetch_array($query))
                          echo $k['image'];
                      ?>" style="width:30%;border-radius: 50%;position:relative;left:1%;top:3%;height:25em;">                                                           
            <h2 id="name" style="color:darkgray;position:relative;left:20%;margin-top:3%;"><?php
                $a=$_SESSION['email'];
                      $q="select * from user where email='$a';";
                      $query=mysqli_query($hritik,$q);
                  while($k=mysqli_fetch_array($query))
                      echo $k['name'];
                ?></h2>
            <table border="1" style="width:60%;position:relative;margin-top:8%;left:2%;color:grey;height:15em;">
                <tr>
                    <td>Name:</td>
                    <td><?php
                        $a=$_SESSION['email'];
                      $q="select * from user where email='$a';";
                      $query=mysqli_query($hritik,$q);
                        while($k=mysqli_fetch_array($query))
                      echo $k['name'];?></td>
                </tr>
                <tr>
                    <td>College:</td>
                    <td><?php
                        echo $_SESSION['college'];
                        ?></td>
                </tr>
                <tr>
                    <td>Mobile No.</td>
                    <td><?php
                        echo $_SESSION['mobile'];
                        ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php
                        $a=$_SESSION['email'];
                      $q="select * from user where email='$a';";
                      $query=mysqli_query($hritik,$q);
                  while($k=mysqli_fetch_array($query))
                      echo $k['sex'];
                        ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php
                        echo $_SESSION['email'];
                        ?></td>
                </tr>
            </table>
        </div>
        <div>
            <h2 id="change" style="color:dimgray;position:relative;left:5%;margin-top:3%;">Change Your Password:</h2>
            <form method="post">
            <input type="password" name="cur" id="cur" placeholder="Current Password"><br><br>
             <input type="password" name="new" id="new" placeholder="New Password"><br><br>
              <input type="password" name="renew" id="renew" placeholder="Re-enter new Password"><br><br>
            <input type="submit" value="Done" name="sub" id="sub">
            </form>
        </div>
    </body>
</html>
<?php
 if(isset($_POST['sub']))
 {
     $a=$_SESSION['email'];
     @$b=$_POST['new'];
     @$c=$_POST['renew'];
    $q="select * from user where email='$a';";
     $query=mysqli_query($hritik,$q);
     while($k=mysqli_fetch_array($query))
         $tr= $k['pass'];
     
     if($b==$c)
     {
     if($_POST['cur']==$tr)
     {
         if(strlen($b)>5){
         $q="UPDATE `user` SET `pass`='$b' WHERE email='$a';";
         $query=mysqli_query($hritik,$q);
         echo "<script>alert('Password changed Successfully');</script>";}
         else{
             echo "<script>alert('password should contain 5 letters');</script>";
         }
     }
    else{
        echo "<script>alert('enter currect pass');
        var box1=document.getElementById('cur');
        box1.style.border='2px solid red';
        box1.focus();
        </script>";
    }
             
     }
     else{
        echo "<script>alert('Not match');
            var box1=document.getElementById('new');
            var box2=document.getElementById('renew');
            box1.style.border='2px solid red';
            box2.style.boder='2px solid red';
            box1.focus();
            box2.focus();
         </script>";
     }
 }
?>