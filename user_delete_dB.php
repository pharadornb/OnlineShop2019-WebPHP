<?php
	session_start();
	include("config.php");
	
	$e1=$_GET["delete"];
	$user5 = $_SESSION['user_username'];
	$count=0;

	$products=mysqli_query($connection,"SELECT o.product_code, count(o.product_code) count1 FROM orders o LEFT JOIN products p ON o.product_code = p.product_code GROUP BY product_code, order_fullname HAVING order_fullname LIKE '$user5' AND product_code LIKE '$e1'; ");
	while($orders = mysqli_fetch_array($products)) {
		$count = $orders['count1']+$count;
	};

	mysqli_query($connection, "UPDATE products SET product_stock = product_stock+$count WHERE product_code = '".$_GET['delete']."'; ");
	mysqli_query($connection, "DELETE FROM orders WHERE product_code = '".$_GET['delete']."';");
			echo "<script> alert('ลบสินค้านี้ในตะกร้าเสร็จสิ้นครับ/ค่ะ');window.location=index.php</script>";
			echo "<meta http-equiv='refresh' content='1;URL=user_order.php'>";
?>