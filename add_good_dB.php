<?php
	include("config.php");

		move_uploaded_file($_FILES["file1"]["tmp_name"], "image/" . $_FILES["file1"]["name"]);
		$file1_img = $_FILES["file1"]["name"];

 		$sql="INSERT INTO products (id,product_code,product_name,product_desc,product_img_name,product_price,product_catalog_id,product_stock)
 		VALUES('', '" . $_POST["goods_code"] . "', '" . $_POST["goods_name"] . "', '" . $_POST["comment"] . "', '$file1_img', " . $_POST["goods_price"] . ", " . $_POST["goods_catalog"] . ", " . $_POST["goods_stock"] . ")";
        mysqli_query($connection,$sql);

        echo "<script> alert('เพิ่มสินค้าเสร็จสิ้นครับ/ค่ะ');window.location=index.php</script>";
		echo "<meta http-equiv='refresh' content='1;URL=admin.php'>";
?>