<?php
	session_start();
	include("config.php");
?>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="goods.css" type="text/css" />
	<link rel="stylesheet" href="table6.css" type="text/css" />
	<link rel="shortcut icon" href="image/logo_title.ico" />
</head>

<body>
	<?php
		if($_SESSION['user_id'] == ''){
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
		}else if($_SESSION['status']!=1){
			echo "<meta http-equiv='refresh' content='1;URL=logout.php'>";
		}else{
			
			$user = $_SESSION['user_username'];
			$pass = $_SESSION['user_password'];

			$sql="SELECT * FROM user_account WHERE Username='$user' AND Password='$pass';";
			$result=mysqli_query($connection,$sql);
			$num=mysqli_num_rows($result);

			if($num<=0){
				echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
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
							<td colspan="3" align="center"><h1><b><b36>รายการสินค้า</b36></b></h1></td>
						</tr>
			</table>
				<table border="1" id="customers">
					<tr>
							<th>Code</th>
							<th>ชื่อสินค้า</th>
							<th>รายละเอียดสินค้า</th>
							<th>ราคา</th>
							<th>รูปภาพสินค้า</th>
							<th>Stock</th>
							<th>แก้ไขสินค้า</th>
							<th>ลบสินค้า</th>
					</tr>
						<?php
							if(!empty($_POST['product_search'])){
								$products = mysqli_query($connection, "SELECT * FROM products where product_code Like '%".$_POST['product_search']."%' OR product_name Like '%".$_POST['product_search']."%' OR product_desc Like '%".$_POST['product_search']."%' OR product_price Like '%".$_POST['product_search']."%' ORDER BY product_code");
							}else{
								$products = mysqli_query($connection, "SELECT * FROM products ORDER BY product_code");
							}
							if(empty(mysqli_num_rows($products))){
								echo "<tr><td colspan='8' align='center'><b36>ไม่มีสินค้านี้ในระบบ</b36></td></tr>";
							}else{
								while($product = mysqli_fetch_array($products)) {
								echo "<tr> <td align='center'><b>" . $product['product_code'] . "</b></td>". "<td align='center' >" . $product['product_name'] . "</td>" . "<td align='left'>" . $product['product_desc'] . "</td>" . "<td align='center'>" . $product['product_price'] . "<td align='center'> <img src='image/" . $product['product_img_name']  . " ' width='150px' /></td>" . "</td>" . "<td align='center'>" . $product['product_stock'] . "</td>" .  "<td align='center'>" ."<a href='admin_edit.php?edit=$product[product_code]'><img src='image/edit.png' width='24px' />Edit</a>"."</td>". "<td align='center'>" ."<a href='admin_delete_dB.php?delete=$product[product_code]'><img src='image/bin.png' width='24px' />Delete</a>"."</td>"."</tr>";
							}
						}
						?>
				</table>
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