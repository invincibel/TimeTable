<?php
 include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign_UP</title>
      <link rel="icon" href="logo.png">
        <link rel="stylesheet" href="cssfiles/sign.css">
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Aguafina Script' rel='stylesheet'>
                <link rel="icon" href="logo.png">
    </head>
    <body>
        <div id="box">
            <h2 id="heading">Sign Up</h2>
            <form method="post" enctype="multipart/form-data">
                <font style="font-family: 'Aguafina Script';font-size:30px;">Name:</font><br>
                <input type="text" name="name" placeholder="Full Name ...">
                <br><br>
                <font style="font-family: 'Aguafina Script';font-size:30px;">Email:</font><br>
                <input type="email" name="email" placeholder="Email...">
                <br><br>
                <font style="font-family: 'Aguafina Script';font-size:30px;">Password:</font><br>
                <input type="password" name="pass" placeholder="Password..">
                <br><br>
                <font style="font-family: 'Aguafina Script';font-size:30px;">Phone:</font><br>
                <input type="tel" name="tel" placeholder="9149045778">
                <br><br>
                <font style="font-family: 'Aguafina Script';font-size:30px;">College:</font><br>
                <input type="text" name="college" placeholder="College Name..">
                <br><br>
                <font style="font-family: 'Aguafina Script';font-size:30px;">Gender:</font><br>
                <input type="radio" name="sex" value="male" class="radio">Male:<br>
                <input type="radio" name="sex" value="female" class="radio">Female:
                <br><br>
                <font style="font-family: 'Aguafina Script';font-size:30px;">Upload your image:</font><br><br>
                <input type="file" name="image" required="required" id="nope"><br><br>
                <input type="submit" name="submit" id="sub"><br><br>
            </form>    
        </div>
    </body>
</html>
<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $a=$_POST['name'];
    $b=$_POST['email'];
    $c=$_POST['pass'];
    @$d=$_POST['sex'];
    $e=$_POST['tel'];
    $f=$_POST['college'];
  $g="select * from user";
    $fet=mysqli_query($hritik,$g);
    while($k=mysqli_fetch_array($fet))
    {
        if($k['email']==$b)
        {
            echo "<script>alert('Email already exists');</script>";
            exit();
        }
    }
 
   if(strlen($a)<=2 || strlen($c)<=5 || strlen($d)<2 || strlen($f)<2)
   {
       echo "<script>alert('Something went wrong check out pass should be of length 4');</script>";
       exit();
   }
       else
    {
        $imagename=$_FILES['image']['name'];
        $tempimgname=$_FILES['image']['tmp_name'];
        move_uploaded_file($tempimgname,"upload/$imagename");
       $q="INSERT INTO `user`(`name`, `email`, `pass`, `sex`, `image`,`mobile`,`college`) VALUES ('$a','$b','$c','$d','$imagename','$e','$f');";
        $query=mysqli_query($hritik,$q);
        header("location:index.php");
    }
}
?>
