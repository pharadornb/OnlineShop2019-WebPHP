<?php
	session_start();
	include("config.php");
?>
<html>
<head>
	<title>จัดการสั่งซื้อ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/logo_title.ico" />
	<link rel="stylesheet" href="goods.css" type="text/css" />
	<link rel="stylesheet" href="table9.css" type="text/css" />
</head>

<body>
	<?php
		if($_SESSION['user_id'] == ''){
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
		}else if($_SESSION['status']!=1){
			echo "<meta http-equiv='refresh' content='1;URL=logout.php'>";
		}else{
			
			$user = $_SESSION['user_username'];
			$user2 = $_SESSION['user_username'];
			$pass = $_SESSION['user_password'];

			$sql="SELECT * FROM user_account WHERE Username='$user' AND Password='$pass';";
			$result=mysqli_query($connection,$sql);
			//นับผลลัพธ์
			$num=mysqli_num_rows($result);

			if($num<=0){
				echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
			}else{
		}
	?>
	<table border="0" align="center" width="60%" bordercolor="grey" bgcolor="white" >
		<?php
				include("head2.php");
			?>
		<tr>
			<td colspan="3">
				<div class="topnav">
  					<a class="active" href="admin.php">จัดการรายการสินค้า</a>
  					<a href="add_good.php">เพิ่มสินค้า</a>
  					<a href="admin_orders.php">จัดการสั่งซื้อ</a>
  					<a href="admin_orders_send.php">สินค้ารอการจัดส่ง</a>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<br /><table border="0" align="center" >
						<tr>
							<td colspan="3" align="center"><h1><b>จัดการสั่งซื้อ</b></h1></td>
						</tr>
			</table>
				<table border="1" id="customers">
					<tr>
							<th>รหัสสินค้า</th>
							<th>ชื่อลูกค้าที่สั่งซื้อ</th>
							<th>ราคาสินค้า</th>
							<th>รับการสั่งซื้อ</th>
						<?php
							$sql="SELECT product_code, order_fullname, price, commiting from orders WHERE commiting = 1 ORDER BY product_code";
							$products = mysqli_query($connection, $sql);

							if(!empty(mysqli_num_rows($products))){
								while($product = mysqli_fetch_array($products)) {
								echo "<tr><td align='center'><bb>" . $product['product_code'] . "</bb></td><td align='center'><b20>" . $product['order_fullname'] ."</b20></td><td align='center'><b20>"  . $product['price'] . ".00</b20></td><td align='center'>" .  "<a href='admin_add_orders.php?order=$product[product_code]'><img src='image/shopping cart.png' width='40px' /><br />Order</a>"."</td></tr>";
								}
							}else{
								echo "<tr><td colspan='4' align='center'> ยังไม่มีลูกค้าทำการสั่งซื้อสินค้าค่ะ! </tr></td>";
							}
							
						?>
				</table><br />
			</td>
		</tr>
		<?php
          include("footer.php");
        ?>
	</table>
	<?php	
	}
	?>
</body>
</html>