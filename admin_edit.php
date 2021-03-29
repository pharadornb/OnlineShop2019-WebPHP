<?php
	session_start();
	include("config.php");
?>
<html>
<head>
	<title>แก้ไขรายการสินค้า</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/logo_title.ico" />
	<link rel="stylesheet" href="goods.css" type="text/css" />
	<link rel="stylesheet" href="table5.css" type="text/css" />
</head>
<style type="text/css">
	textarea{
		font-family: myFirstFont;
		font-size: 18px;
	}
</style>
<body>
	<?php
		if($_SESSION['user_id'] == ''){
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
		}else if($_SESSION['status']!=1){
			echo "<meta http-equiv='refresh' content='1;URL=logout.php'>";
		}else{
			
			$user = $_SESSION['user_username'];
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
	<table border="0" align="center" width="60%" bordercolor="grey" bgcolor="white">
		<?php
				include("head2.php");
			?>
		<tr>
			<td colspan="3">
				<div class="topnav">
  					<a class="active" href="admin.php">จัดการรายการสินค้า</a>
  					<a href="add_good.php">เพิ่มสินค้า</a>
  					<a href="admin_orders.php">จัดการสั่งซื้อ</a>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<br /><table border="0" align="center">
						<tr>
							<td colspan="3" align="center"><h1><b>รายการสินค้า</b></h1></td>
						</tr>
			</table>
				<table border="1" id="customers">
					<tr>
							<th>รหัสสินค้า</th>
							<th>ชื่อสินค้า</th>
							<th>รายละเอียดสินค้า</th>
							<th>ราคา</ค้าth>
							<th>รูปภาพสินค้า</th>
							<th>จำนวนสินค้า(ชิ้น)</th>
							<th>บันทึกการแก้ไขสินค้า</th>
					</tr>
						<form action="admin_edit_dB.php" method="POST" enctype="multipart/form-data">
						<?php
							$products = mysqli_query($connection, "SELECT * FROM products WHERE product_code = '".$_GET["edit"]."' ORDER BY product_code");
							while($product = mysqli_fetch_array($products)) {
								echo "<tr> <td align='center'><b> <input type='text' align='center' size=4 name='goods_code' value=" . $product['product_code'] . " > </b></td>". "<td align='center' > <input type='text' align='center' size=20 name='goods_name' value=" . $product['product_name'] . "> </td>" . "<td align='center'> <textarea rows='7' cols='30' name='comment'>" . $product['product_desc'] . "</textarea> </td>" . "<td align='center'> <input type='text' align='center' size=7 name='goods_price' value=" . $product['product_price'] . "><td align='center'> <img src='image/" . $product['product_img_name']  . " ' width='150px' /><br /> <input type='file' name='file4' /></td>" . "</td>" . "<td align='center'> <input type='text' align='center' size=5 name='goods_stock' value=" . $product['product_stock'] . "></td>" .  "<td align='center'>" ."<input type='submit' name='submit' value='บันทึกการแก้ไข'>"."</td>". "</tr>";
							}
						?>
					</form>
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