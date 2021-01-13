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
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>

<div class="header">
  <h1 align="center">Welcome to Admin Home Page</h1>
</div>

<div class="table container">

  <div class="container">
     <h2>All Customer Orders</h2>  
  <div >
<?php
ob_start();
 include("../connection.php");
 $sql="select * from customer_order where status=0";
 $r=mysqli_query($con,$sql);
 echo "<table id='customers'>";
 echo "<tr>
 <th>Order ID</th>
 <th>Customer ID</th>
 <th>Order Date</th>
 <th>Action</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $oid=$row['order_id'];
		$cid=$row['cus_id'];
		$odate=$row['order_date'];
    echo "<tr>
    <td>$oid</td><td>$cid</td><td>$odate</td><td><a href='cus_order.php?action=show&id=$oid'>Show Details</a></td>
    </tr>";
    }
	echo "</table>";
?>
</div>
  <div class="container">
<?php
ob_start();
include("../connection.php");
echo "<hr/>";
echo"<h2>Order Details</h2>";
if(isset($_GET['action']) and $_GET['action'] == 'show')
{
 $oid=$_GET['id'];
 $_SESSION['order_id']=$oid;
 $sql="select * from orderline where order_id='$oid'";
 $r=mysqli_query($con,$sql);
 echo "<table id='customers'>";
 echo "<tr>
 <th>Book ID</th>
 <th>Quantity</th>
 <th>Total Price</th>
  </tr>";
  $gtotal=0;
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['id'];
		$q=$row['quantity'];
		$total=$row['total'];
    echo "<tr>
    <td>$id</td><td>$q</td><td>$total</td>
    </tr>";
	$gtotal=$gtotal+$total;
    }
	echo "<tr><td colspan='2' align='right'>Grand Total</td>
	<td>$gtotal</td></tr>";
	echo "</table>";
}
?>	
</div>
<form action="cus_order.php" method="post">
<div class="container">
    <input type="submit" value="Confirm Order" name="corder">
</div>
</form>
<?php
ob_start();
include("../connection.php");
if(isset($_POST['corder']))
{
	$oid=$_SESSION["order_id"];
	$sql="select * from orderline where order_id='$oid'";
    $r=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($r))
    {
        $id=$row['id'];
		$q=$row['quantity'];
		$sqlupdate="update store set quantity=quantity-$q where id='$id'";
		mysqli_query($con,$sqlupdate);
    }
	$sqlorderupdate="update customer_order set status=1 where order_id='$oid'";
    mysqli_query($con,$sqlorderupdate);
header("Location:cus_order.php");
}
?>
</body>
</html>