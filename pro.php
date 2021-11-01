<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "shopdb");
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);				
				echo '<script>window.location="pro.php"</script>';
				break;
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Checkout</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#FFFFB7;" >
<div class="form" align="center" width="80%" style= align:center">
<h3>YOUR ORDERS</h3>

			<div class="table-responsive">
				<table class="table table-bordered"  style="width:70%; align:center">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>Rs <?php echo $values["item_price"]; ?></td>
						<td>Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="pro.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">Rs <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
			<h3 align="center" >
			&nbsp;<a href="index.php" style="background-color:green; color:white">Shop More </a>&nbsp;
			&nbsp;<a href="payment.php?sum=<?php echo $total ?>" style="background-color:green; color:white"> Payment </a>&nbsp;
			&nbsp;<a href="exit.php" style="background-color:green; color:white"> Exit </a>&nbsp;
			</h3>
</div>
</body>
</html>