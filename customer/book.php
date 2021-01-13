<?php include "home.php"; ?>
<?php
   
   // Cart implementation code
   if(isset($_POST['add']))
   {
	   if(isset($_SESSION['cart']))  
	   {
		 $item_array_id=array_column($_SESSION['cart'],'item_id'); 
 		 if(!in_array($_GET['id'],$item_array_id))
		 {
			 $count=count($_SESSION['cart']);
			 $item_array= array ( 
		   'item_id' => $_GET['id'],
		   'item_name' => $_POST['hname'],
		   'item_price' => $_POST['hprice'],
		   'item_q' => $_POST['quantity']
		   );
			$_SESSION['cart'][$count]=$item_array; 
		 }
		 else
		 {
			 echo "<script>alert('Item already added')</script>";
			 echo "<script>window.location='book.php'</script>";
		 }
	   }	
       else
	   {
		   $item_array= array ( 
		   'item_id' => $_GET['id'],
		   'item_name' => $_POST['hname'],
		   'item_price' => $_POST['hprice'],
		   'item_q' => $_POST['quantity']
		   );
		   $_SESSION['cart'][0]=$item_array;
	   }		   
   }
   // Item Remove from cart
   if(isset($_GET['action']) and $_GET['action'] == 'delete')
   {
	  foreach ($_SESSION['cart'] as $keys => $values)
	  {
		  if($values['item_id'] == $_GET['id'])
		  {
			  unset($_SESSION['cart'][$keys]);
		  }
	  }		  
   }
   ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
<div class="header">
  <h1 align="center">Welcome to Customer Home Page</h1>
</div>
<div class="table container">
  <div class="container">
  <form action="book.php" method="post">
  <div class="row">
    <div class="col-25">
    </div>
    <div class="col-75">
	<label for="category">Select a Category</label>
	<select name="category">
<?php
 include("../connection.php");
 $sql="select distinct category from addbook";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $category=$row['category'];
        echo "<option value='$category'>$category</option>";
    }
?>
</select>
  </div>
  </div> 
  <div >
    <input type="submit" value="GO" name="go">
  </div>
  </form>
</div>
<div>

<?php
include("../connection.php");
if(isset($_POST['go']))
{
	$c=$_POST['category'];
	
	$query="select * from addbook,store where addbook.id=store.id and addbook.category='$c'";
	$r=mysqli_query($con,$query);
	echo "<table id='customers'>";
 echo "<tr>
 <th>Book Name</th>
 <th>category</th>
 <th>author Name</th>
 <th>Book Price</th>
 <th>Add quantity</th>
 <th>Action</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
		$id=$row['id'];
        
		$name=$row['name'];
		$category=$row['category'];
		$author=$row['author'];
		$cost=$row['cost'];
	echo "<form action='book.php?action=add&id=$id' method='post'>";	
    echo "<tr>
    <td>$name</td><td>$category</td><td>$author</td><td>$cost</td>
    <td><input type='text' value='1' name='quantity'>
	<input type='hidden' value='$name' name='hname'>
	<input type='hidden' value='$cost' name='hprice'>
	</td>
	<td><input type='submit' value='Add to cart' name='add'></td>
	</tr>";
	echo "</form>";
    }
	echo "</table>";
}
?>
</div>
<div>
<h3>Order</h3>
<table id='customers'>
<tr>
 <th>Book Name</th>
 <th>quantity</th>
 <th>Book Price</th>
 <th>Total</th>
 <th>Action</th>
</tr>
<?php
if(!empty($_SESSION['cart']))
{
	$total=0;
	foreach ($_SESSION['cart'] as $keys => $values)
	{
		echo "<tr>";
?>		
		<td><?php echo $values['item_name']; ?></td>		
		<td><?php echo$values['item_q']; ?></td>
		<td><?php echo$values['item_price']; ?></td>
		<td><?php echo number_format($values['item_q']*$values['item_price'],2); ?></td>
		<td><a href='book.php?action=delete&id=<?php echo $values['item_id']; ?>'>Remove</a></td>
	    </tr>
<?php		
		$total=$total+($values['item_q']*$values['item_price']);
	}
	echo "<tr>";
	echo "<td colspan='3' align='right'>Total</td>";
?>	
	<td><?php echo number_format($total,2); ?></td>
	<td></td>
<?php	
}
?>

</table>
<div>
<form action='book.php' method='post'>
<div class="header">
    <input type="submit" value="Submit your Order" name="corder">
</div>
</form>
<?php
// Save the orders in database
if(isset($_POST['corder']))
{
	include("../connection.php");
	$num=rand(10,1000);
	$order_id="O-".$num;
	$order_date=date("Y-m-d");
	$cid=$_SESSION['email'];
	$sqlorder="insert into customer_order values('$order_id','$cid','$order_date',0)";
	mysqli_query($con,$sqlorder);
	foreach ($_SESSION['cart'] as $keys => $values)
	{
		$total=0;
		$id=$values['item_id'];
		$quantity=$values['item_q'];
		$total=$values['item_q']*$values['item_price'];
		$sql="insert into orderline values('$order_id','$id','$quantity',$total)";
	    mysqli_query($con,$sql);
	}
	echo "your order has been submited successfully";
	unset($_SESSION['cart']);
}
?>	
</div>
</body>
</html>
