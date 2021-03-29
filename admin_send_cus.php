<?php
	session_start();
	include("config.php");
	$sql="SELECT order_date, order_fullname, product_code, price FROM orders_admin WHERE order_fullname = '".$_GET['order']."'";
		$products=mysqli_query($connection,$sql);
		while($product = mysqli_fetch_array($products)) {
			$a1=$product['order_date'];
			$a2=$product['order_fullname'];
			$a3=$product['product_code'];
			$a4=$product['price'];
			$sql="INSERT INTO history_orders (order_date, order_fullname, product_code, price) VALUES('$a1', '$a2', '$a3', $a4)";
			mysqli_query($connection, $sql);
		}

		$sql="DELETE FROM orders_admin WHERE order_fullname = '".$_GET['order']."'";
		mysqli_query($connection, $sql);

		echo "<script> alert('จัดส่งสินค้าและเพิ่มลงในรายการประวัติการสั่งซื้อของลูกค้าเสร็จสิ้นครับ/ค่ะ ');window.location=index.php</script>";
		echo "<meta http-equiv='refresh' content='1;URL=admin_orders_send.php'>";
?>