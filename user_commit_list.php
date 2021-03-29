<?php
	include("config.php");
	session_start();
	$user = $_SESSION['user_username'];
	$sql ="UPDATE orders SET commiting = 1 WHERE order_fullname LIKE '$user'";
	mysqli_query($connection, $sql);

	echo "<script> alert('ทำการสั่งซื้อเสร็จสิ้นครับ/ค่ะ');window.location=index.php</script>";
	echo "<meta http-equiv='refresh' content='1;URL=user_order.php'>";
?>