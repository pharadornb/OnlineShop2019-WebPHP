<?php
	session_start();
	include("config.php");
	$e1=$_GET["order"];
	$e2=$_GET["order"];
	$user = $_SESSION['user_username'];

	$sql="SELECT order_fullname, product_code, price, commiting FROM orders WHERE commiting = 1 AND product_code = '$e1' ";
	$products = mysqli_query($connection, $sql);
	while($product = mysqli_fetch_array($products)) {
		$k1=$product['order_fullname'];
		$k2=$product['product_code'];
		$k3=$product['price'];
		$sql="INSERT INTO orders_admin (order_fullname, product_code, price) VALUES('$k1', '$k2', $k3)";
		mysqli_query($connection, $sql);
	}

		$sql="DELETE FROM orders WHERE product_code = '$e2'";
		mysqli_query($connection, $sql);

		echo "<script> alert('รับรายการสินค้าของลูกค้าเสร็จสิ้นครับ/ค่ะ');window.location=index.php</script>";
		echo "<meta http-equiv='refresh' content='1;URL=admin_orders.php'>";
?>