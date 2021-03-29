<?php
	session_start();
	include("config.php");
?>
<html>

<head>
	<title>รายการสินค้าที่สั่งซื้อ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/logo_title.ico" />
	<link rel="stylesheet" href="goods.css" type="text/css" />
	<link rel="stylesheet" href="table8.css" type="text/css" />
</head>

<body>
	<?php
		if($_SESSION['user_id'] == ''){
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
		}else if($_SESSION['status']!=2){
			echo "<meta http-equiv='refresh' content='1;URL=logout.php'>";
		}else{
			$user = $_SESSION['user_username'];
			$pass = $_SESSION['user_password'];
			$user2 = $_SESSION['user_username'];
			$user3 = $_SESSION['user_username'];
			$user5 = $_SESSION['user_username'];

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
				<br /><table border="0" align="center">
						<tr>
							<td colspan="3" align="center"><b36><b>รายการสินค้าที่สั่งซื้อ</b></b36></td>
						</tr>
				</table>

			<form action="user_commit_list.php" method="POST">
				<table border="1" id="customers">
					<tr>
							<th>รหัสสินค้า</th>
							<th>รูปภาพสินค้า</th>
							<th>ชื่อสินค้า</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Sum price</th>
							<th>ลบสินค้า</th>
					</tr>

				<?php
						$sum=0;

						$sql="SELECT product_code, order_fullname, commiting from orders WHERE commiting = 0 AND order_fullname LIKE '$user5'";
						$commit=mysqli_query($connection, $sql);
						if(empty(mysqli_num_rows($commit))){
								echo "<tr><td colspan = 7 align='center'>ตะกร้าสินค้าว่างค่ะ!!!!</td></tr>";
						}else{
								
						$row="SELECT o.product_code, p.product_img_name, count(o.product_code) cpc, p.product_price, p.product_name , count(o.product_code)*p.product_price sum FROM orders o LEFT JOIN products p ON o.product_code = p.product_code GROUP BY product_code, order_fullname HAVING order_fullname LIKE '$user2'";
						$products = mysqli_query($connection, $row);
						while($orders = mysqli_fetch_array($products)) {
								echo "<tr><td>" . $orders['product_code'] . "</td><td><img src='image/" . $orders['product_img_name']  . "' width='150px'/></td><td>". $orders['product_name'] ."</td><td>" . $orders['product_price'] . "</td><td align='center'>". $orders['cpc'] ." </td><td>". $orders['sum'] . "</td><td align='center'>" . "<a href='user_delete_dB.php?delete=$orders[product_code]'><img src='image/bin.png' width='24px' />Delete</a>" . "</td></tr>";
						}
						$sql="SELECT o.product_code, count(o.product_code), p.product_price FROM orders o LEFT JOIN products p ON o.product_code = p.product_code GROUP BY product_code, order_fullname HAVING order_fullname LIKE '$user3'";
						$products = mysqli_query($connection, $sql);
						while($orders = mysqli_fetch_array($products)){
								$sum=($orders['count(o.product_code)']*$orders['product_price'])+$sum;
									}
							echo "<tr><td colspan='8' align='right'> <b1>ราคารวมของสินค้าทั้งหมด: </b1>" . $sum . ".00 บาท";
							echo "</td></tr><table>";
							echo "<br /><input type='submit' name='submit' value='ทำการสั่งซื้อ' />";
						}
					?>
	</table>
</form>
	<?php
		include("footer.php");
	?>
</table>
<?php
	}
?>
</body>
</html>