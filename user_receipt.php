<?php
	session_start();
	include("config.php");
?>
<html>
<head>
	<title>ประวัติการสั่งซื้อ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/logo_title.ico" />
	<link rel="stylesheet" href="goods.css" type="text/css" />
	<link rel="stylesheet" href="table11.css" type="text/css" />
</head>

<body>
	<?php
		if($_SESSION['user_id'] == ''){
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
		}else if($_SESSION['status']!=2){
			echo "<meta http-equiv='refresh' content='1;URL=logout.php'>";
		}else{
			
			$user = $_SESSION['user_username'];
			$user2 = $_SESSION['user_username'];
			$pass = $_SESSION['user_password'];

			$sql="SELECT * FROM user_account WHERE Username='$user' AND Password='$pass';";
			$result=mysqli_query($connection,$sql);
			$num=mysqli_num_rows($result);

			if($num<=0){
				echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
			}else{
		}
	?>
	<table border="0" align="center" bordercolor="grey" bgcolor="white" width="60%">
		<?php
			include("head3.php");
		?>
		<tr>
			<td colspan="3">
				<div class="topnav">
  					<a class="active" href="user.php">รายการสินค้า</a>
  					<a href="user_order.php">สินค้าที่สั่งซื้อ</a>
  					<a href="user_receipt.php">ประวัติการสั่งซื้อ</a>
  					<ul>
  					<li class="active" style="float:right"><a href="user_account.php">บัญชีผู้ใช้</a></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<br /><table border="0" align="center" >
						<tr>
							<td colspan="3" align="center"><h1><b>ประวัติการสั่งซื้อสินค้า</b></h1></td>
						</tr>
			</table>
				<table border="1" id="customers">
					<tr>
							<th>วัน/เดือน/ปี เวลา ที่สั่งซื้อ</th>
							<th>รหัสสินค้าที่สั่งซื้อ</th>
							<th>ราคาของสินค้า</th>
					</tr>
						<?php
							$sql="SELECT order_date, product_code, price FROM history_orders WHERE order_fullname = '$user2'";
							$products = mysqli_query($connection, $sql);
							while($product = mysqli_fetch_array($products)) {
							echo "<tr><td>" . $product['order_date'] . "</td><td>" . $product['product_code'] . "</td><td>" . $product['price'] . ".00 </td></tr>";
							}
						?>
				</table><br/ >
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