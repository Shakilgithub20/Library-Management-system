<?php include "includes/sidebar.php"; ?>
<?php include "includes/navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <style>
fieldset {
  background-color: #eeeeee;

  border: 1px solid rgb(255,232,57);
  width: 400px;
  margin:auto;
  //other stuff
  margin: 0 auto;
  text-align: left;
}

legend {
  background-color: gray;
  color: white;
  padding: 5px 10px;
}

input {
  margin: 5px;
}
form
{
    text-align: center;
}

</style>
</head>
<body>
<h1 align="center">Add New Book</h1>
<form action="addbook.php" method="post">
<fieldset >
<legend align="center">Book</legend>
<div class="container">
  <input  type="text" align="center" name="id" id="id"  placeholder="Book Id"><br><br>
  <input  type="text" align="center" name="name" id="name"  placeholder="Book name"><br><br>
  <input  type="text" align="center" name="author" id="author"  placeholder="Author name"><br><br>
  <input  type="text" align="center" name="cost" id="cost"  placeholder="Cost"><br><br>
  <input  type="text" align="center" name="quantity" id="quantity"  placeholder="Quantity"><br><br>
</div>
 </fieldset>
 <from>
 <fieldset >
 <div class="container">
 <div class="col-75">
      <select id="category" name="category">
        <option value="historical fiction">Historical Fiction</option>
        <option value="science fic-tion"> Science Fic-tion   </option>
        <option value="graphic novel">Graphic Novel</option>
        <option value="Horror">Horror</option>
        <option value="Thriller">Thriller</option>
        <option value="Mystery">Mystery</option>
      </select>
</div>
</div>
</fieldset >
</form>
<input type="submit" value="Add" name="add" class="btn btn-warning">
</form>
</body>
</html>

<?php
include("../connection.php");
if(isset($_POST['add']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$author=$_POST['author'];
  $cost=$_POST['cost'];
  $quantity=$_POST['quantity'];
  $category=$_POST['category'];
  $query="insert into addbook values('$id','$name','$author','$cost','$quantity','$category')";
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
