<?php
	session_start();
	include("config.php");
?>
<html>
<head>
	<title>รอการจัดสั่ง</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/logo_title.ico" />
	<link rel="stylesheet" href="goods.css" type="text/css" />
	<link rel="stylesheet" href="table10.css" type="text/css" />
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

			//SELECT * FROM user NATURAL JOIN user_detail
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
				<br /><table border="0" align="center">
						<tr>
							<td colspan="3" align="center"><h1><b>สินค้ารอการจัดส่ง</b></h1></td>
						</tr>
			</table>
				<table border="1" id="customers">
					<tr>
							<th>วันที่ทำรายการ</th>
							<th>ชื่อลูกค้า</th>
							<th>ราคารวม</th>
							<th>การจัดส่ง</th>
						<?php
							$sql="SELECT MAX(order_date), order_fullname, product_code, SUM(price) FROM orders_admin GROUP BY order_fullname";
							$products=mysqli_query($connection,$sql);

							if(!empty(mysqli_num_rows($products))){
							while($product = mysqli_fetch_array($products)) {
								echo "<tr><td align='center'><b><b20>" . $product['MAX(order_date)'] . "</b20></b></td><td align='center'><b20>" . $product['order_fullname'] . "</b20></td><td align='center'><b20>" . $product['SUM(price)'] . "</b20></td><td align='center'><b20>" . "<a href='admin_send_cus.php?order=$product[order_fullname]'><img src='image/send.png' width='40px' />ส่งเรียบร้อย</a>" ."</b20></td></tr>";
								}
							}else{
									echo "<tr><td colspan='4' align='center'> รายการจัดส่งว่างครับ/ค่ะ!! </tr></td>";
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