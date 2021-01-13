<?php include "includes/sidebar.php"; ?>
<?php include "includes/navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
<div class="header">
  <h1 align="center">Welcome to Admin Home Page</h1>
</div>
<div class="table container ">
<div class="container">
  <form action="bookstore.php" method="post">
<input type="submit" value="Show Book" name="show" class="btn btn-primary">
</form>
</div>
  </div>
<?php
include("../connection.php");
if(isset($_POST['show']))
{
$sql="select * from addbook";
$r=mysqli_query($con,$sql);
echo "<table id='customers'>";
echo "<tr>
<th>Book id</th>
<th>Book Name</th>
<th>author name</th>
<th>cost</th>
<th>quantity</th>
<th>category</th>

</tr>";
  while($row=mysqli_fetch_array($r))
  {
      $id=$row['id'];
  $name=$row['name'];
  $author=$row['author'];
      $cost=$row['cost'];
      $quantity=$row['quantity'];
      $category=$row['category'];
  echo "<tr>
  <td>$id</td><td>$name</td><td>$author</td><td>$cost</td><td>$quantity</td><td>$category</td>
  </tr>";
  }
echo "</table>";
}
?>
  <form   action="bookstore.php" method="post">
  <div class="container">
  <hr/>
  
    <div class="col-25">
    
      <label for="name">Book ID</label>
    </div>
    <div class="col-75">
	<select name="id" > 
  </fieldset>
<?php
 include("../connection.php");
 $sql="select id from addbook";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['id'];
        echo "<option value='$id'>$id</option>";
    }
?>
  <div class="form-group"><br>
    <label for="exampleInputEmail1">Quantity</label> <br>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="quantity" placeholder="Quantity.">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cost" placeholder="cost..$">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <button type="submit" name ="add" class="btn btn-primary" >Add</button>
</form>
</div>
</body>
</html>
<?php
include("../connection.php");
if(isset($_POST['add']))
{
	$id=$_POST['id'];
	$quantity=$_POST['quantity'];
	$cost=$_POST['cost'];
	
	$query="insert into store values('$id',$cost,$quantity)";
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