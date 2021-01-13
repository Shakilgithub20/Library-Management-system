<!DOCTYPE html>
<html>
    <head>
        <title> Registration Form </title>
       <link href="res.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <h1>Registration Form</h1>
        <div class="reg">
            <form id="reg" method="post" action="signup.php">
                <h2>Register Here</h2>
                <label>Username : </label><br>
                <input type="text" name="Username" placeholder="Your namr" id="Username" required><br>
                <label>Email: </label><br>
                <input type="text" name="Email" placeholder="xyz@gmail.com" id="Email" required><br>
                <label>dob : </label><br>
                <input type="text" name="dob" placeholder="Date of Birth" id="dob" required><br></br>
                <label>Gender : </label><br>
                <input type="radio" name="gender" value="Male" checked > Male 
					<input type="radio" name="gender" value="Female"> Female 
                    <input type="radio" name="gender" value="others"> others <br></br>
                    <label for="pwd">Password:</label></br>
                    <input type="password" id="pwd" name="pwd"></br></br>
                         <label for="country">Location</label></br>
                         <select id="country" name="loc">
                         <option value="dhaka">Dhaka</option>
                         <option value="chittagong">Chittagong</option>
                        <option value="khulna">Khulna</option>
                        </select></br>
                        <label>Mobile No : </label><br>
                <input type="text" name="mobile" placeholder="01300092133" id="Mobile" required><br>
                 
                    </textarea><br/><br/>
                    <input type="submit" name="submit" id="submit">
                    <input type="Reset" name ="Reset" id= "Reset">
                    <div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
            </form>
        </div>
    </body>
</html>
<?php
include("connection.php");
if(isset($_POST['submit'])) 
{
	// to receive value from the input fields
	$name=$_POST['Username'];
	$email=$_POST['Email'];
	$loc=$_POST['loc'];
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$password=$_POST['pwd'];
	//customer id generation
	$num=rand(10,100);
	//echo $num;
	$cus_id="c-".$num;
	
	$query="insert into customer values('$cus_id','$name','$loc','$gender',$mobile ,'$dob','$email','$password')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
	
    }
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>