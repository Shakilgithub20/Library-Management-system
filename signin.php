<?php
session_start();
?>
<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="signin.css">
  <link rel="stylesheet" type="text/css" href="signup.css">
  <title>Sign in </title>
</head>

<body>
  <div class="main" >
    <p   href="signup.php" class="sign" align="center">Sign in </p>
    <form class="form1" method="post" action="">
      <input class="un " type="text" align="center" name="email" id="email"  placeholder="useremail">
      <input class="pass" type="password" align="center" name="pass" id="pass" placeholder="Password">
      <div >
      <input type="submit"  class="submit" align="center" name="signin" value="sign in" >
      </div>
      <p class="forgot" align="center"><a href="#">Forgot Password?</p>
       </form>               
    </div>
</body>

</html>
<?php
include("connection.php");
if(isset($_POST['signin']))
{
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$sql="select * from admin where email='$email' and password='$pass'";
    $sql1="select * from customer where email='$email' and password='$pass'";
            $r=mysqli_query($con,$sql);
            $r1=mysqli_query($con,$sql1);
            if(mysqli_num_rows($r)>0)
            {
                $_SESSION['email']=$email;
                $_SESSION['admin_login_status']="loged in";
                header("Location:admin/home.php");
            }
            
            else if(mysqli_num_rows($r1)>0)
            {
                $_SESSION['email']=$email;
                $_SESSION['customer_login_status']="loged in";
                header("Location:customer/home.php");
            }
            else
            {
                echo "<p style='color: red;'>Incorrect email or Password</p>";
            }
	
}
?>