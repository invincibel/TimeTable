<?php
 session_start();
if(isset($_SESSION['email']))
{
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SIGN_IN</title>
     <link rel="icon" href="logo.png">
        <link rel="stylesheet" href="cssfiles/in.css">
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Aguafina Script' rel='stylesheet'>
    </head>
    <body>
      <div id="box">
           <h2 id="heading">Sign In</h2>
          <form method="post">
              <font style="font-family: 'Aguafina Script';font-size:30px;">Email:</font><br>
              <input type="email" name="email" placeholder="Email...">
               <br><br>
                <font style="font-family: 'Aguafina Script';font-size:30px;">Password:</font><br>
                <input type="password" name="pass" placeholder="Password..">
              <br><br>
                <input type="submit" name="submit" id="sub"><br><br>
              <p>Not have account?<a href="signup.php">Sign Up</a></p>
          </form>
        </div>
    </body>
</html>
<?php
 if(isset($_POST['submit']))
 {
     include_once 'connection.php';
     $a=$_POST['email'];
    @ $b=$_POST['password'];
     $q="SELECT * FROM `user`;";
     $query=mysqli_query($hritik,$q);
     while($k=mysqli_fetch_array($query))
     {
         if($k['email']==$a && $k['password']==$b)
         {
             session_start();
             $_SESSION['email']=$a;
             $_SESSION['password']=$b;
             header("location:home.php");
         }
         else
             echo "<script> alert('Invalid username or password');</script>";
     }
 }
?>
