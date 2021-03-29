<?php
	session_start();
	include("config.php");
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="shortcut icon" href="image/logo_title.ico" />
	<link rel="stylesheet" href="goods.css" type="text/css" />
	<link rel="stylesheet" href="table7.css" type="text/css" />
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
							<td colspan="3" align="center"><b36><b>รายการสินค้า</b></b36></td>
						</tr>
			</table>
				<table border="1" id="customers">
					<tr>
							<th>รูปภาพสินค้า</th>
							<th>รหัสสินค้า</th>
							<th>ชื่อสินค้า</th>
							<th>รายละเอียดสินค้า</th>
							<th>ราคา</th>
							<th>สั่งซื้อสินค้า</th>
					</tr>
						<?php
							if(!empty($_POST['product_search'])){
								$products = mysqli_query($connection, "SELECT * FROM products WHERE (product_stock != 0 AND product_code Like '%".$_POST['product_search']."%') OR (product_stock != 0 AND product_name Like '%".$_POST['product_search']."%') OR (product_stock != 0 AND product_desc Like '%".$_POST['product_search']."%') OR (product_stock != 0 AND product_price Like '%".$_POST['product_search']."%') ORDER BY product_code");
							}else{
								$products = mysqli_query($connection, "SELECT * FROM products WHERE product_stock != 0 ORDER BY product_code");
							}
							if(empty(mysqli_num_rows($products))){
								echo "<tr><td colspan='6' align='center'><b36>ไม่มีสินค้านี้ในระบบ</b36></td></tr>";
							}else{
							while($product = mysqli_fetch_array($products)) {
								echo "<tr>" . "<td align='center'> <img src='image/" . $product['product_img_name']  . " ' width='150px' /></td>" ."<td align='center'><b>" . $product['product_code'] . "</b></td>". "<td align='center' >" . $product['product_name'] . "</td>" . "<td align='left'>" . $product['product_desc'] . "</td>" . "<td align='center'>" . $product['product_price'] .   "<td align='center'>" ."<a href='user_add_orders.php?order=$product[product_code]'><img src='image/shopping cart.png' width='40px' />Add</a>"."</td>"."</tr>";
							}
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