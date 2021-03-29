<?php
	include("config.php");
	if(empty($_FILES['file4']['name'])){
		$goods_code=$_POST['goods_code'];
		$goods_name=$_POST['goods_name'];
		$goods_desc=$_POST['comment'];
		$goods_price=$_POST['goods_price'];
		$goods_stock=$_POST['goods_stock'];
		$sql="UPDATE products SET product_code = '$goods_code', product_name='$goods_name', product_desc='$goods_desc', product_price='$goods_price', product_stock='$goods_stock' WHERE product_code = '$goods_code';";
		mysqli_query($connection, $sql);
		echo "<script> alert('แก้ไขสินค้าเสร็จสิ้นครับ/ค่ะ');window.location=index.php</script>";
		echo "<meta http-equiv='refresh' content='1;URL=admin.php'>";
	}else{
		move_uploaded_file($_FILES['file4']['tmp_name'], "image/" . $_FILES['file4']['name']);
		$goods_code=$_POST['goods_code'];
		$goods_name=$_POST['goods_name'];
		$goods_desc=$_POST['comment'];
		$goods_price=$_POST['goods_price'];
		$goods_img_name=$_FILES['file4']['name'];
		$goods_stock=$_POST['goods_stock'];

	$sql="UPDATE products SET product_code = '$goods_code', product_name='$goods_name', product_desc='$goods_desc', product_img_name='$goods_img_name', product_price='$goods_price', product_stock='$goods_stock' WHERE product_code = '$goods_code';";
	mysqli_query($connection, $sql);
	echo "<script> alert('แก้ไขสินค้าเสร็จสิ้นครับ/ค่ะ');window.location=index.php</script>";
	echo "<meta http-equiv='refresh' content='1;URL=admin.php'>";
	}
?>