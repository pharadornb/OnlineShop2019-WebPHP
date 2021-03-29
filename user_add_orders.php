<?php
	include("config.php");
	session_start();
	if($_SESSION['user_id'] == ''){
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
		}else if($_SESSION['status']!=2){
			echo "<meta http-equiv='refresh' content='1;URL=logout.php'>";
		}else{
			
			$user = $_SESSION['user_username'];
			$pass = $_SESSION['user_password'];

			$sql="SELECT * FROM user_account WHERE Username='$user' AND Password='$pass';";
			$result=mysqli_query($connection,$sql);
			$num=mysqli_num_rows($result);

			if($num<=0){
				echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
			}else{
	$sum=0;

	$sql="SELECT product_code, product_price FROM products WHERE product_code LIKE '".$_GET['order']."'";
	$products=mysqli_query($connection, $sql);
	while($orders = mysqli_fetch_array($products)){
		  $sum= $orders['product_price']+$sum;
	}
		

	$sql="SELECT product_stock FROM products WHERE product_stock = 0 ";
	$check_stock=mysqli_query($connection, $sql);
		if(!empty(mysqli_num_rows($check_stock))){
			
			$sql="INSERT INTO orders (id,order_fullname,product_code,price) VALUES('','$user','".$_GET['order']."', $sum);";
			mysqli_query($connection, $sql);
			$sql="UPDATE products SET product_stock = (product_stock-1) WHERE product_code = '".$_GET['order']."'";
			mysqli_query($connection, $sql);
			echo "<script> alert('เพิ่มสินค้าในตะกร้าเสร็จสิ้นครับ/ค่ะ');window.location=index.php</script>";
			echo "<meta http-equiv='refresh' content='1;URL=user_order.php'>";
		}else{
		echo "ไม่มีสินค้าใน Stock ค่ะ";
	}
}
}
?>