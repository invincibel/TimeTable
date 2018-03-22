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
  $g="select * from user";
    $fet=mysqli_query($hritik,$g);
    while($k=mysqli_fetch_array($fet))
    {
        if($k['email']==$b)
            exit();
    }
 
   if(strlen($a)<=2 || strlen($c)<=5 || strlen($d)<2)
       exit();
    else
    {
        $imagename=$_FILES['image']['name'];
        $tempimgname=$_FILES['image']['tmp_name'];
        move_uploaded_file($tempimgname,"upload/$imagename");
       $q="INSERT INTO `user`(`name`, `email`, `pass`, `sex`, `image`) VALUES ('$a','$b','$c','$d','$imagename');";
        $query=mysqli_query($hritik,$q);
        header("location:index.php");
    }
}
?>
