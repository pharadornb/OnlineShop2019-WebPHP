<?php
	include("config.php");
	$products = mysqli_query($connection, "DELETE FROM products WHERE product_code = '".$_GET["delete"]."';");
	echo "<script> alert('ลบสินค้าเสร็จสิ้นครับ/ค่ะ');window.location=index.php</script>";
	echo "<meta http-equiv='refresh' content='1;URL=admin.php'>";
?>