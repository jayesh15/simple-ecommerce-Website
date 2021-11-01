<?php 
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thankyou</title>
</head>
<body style="background-color:#FFFFB7;">
<h1>Payment Successful.<br>
<?php echo $_GET["sum"] ?> Rs has been deducted from you account. <br>
Thank you for shopping with us</h1>
</body>
</html>