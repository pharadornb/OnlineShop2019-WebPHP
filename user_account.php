<?php
	session_start();
	include("config.php");
?>
<html>
<head>
	<title>บัญชีผู้ใช้</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/logo_title.ico" />
	<link rel="stylesheet" href="goods.css" type="text/css" />
	<link rel="stylesheet" href="table7.css" type="text/css" />
</head>

<body><center>
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
				<br /><table border="0" align="center">
						<tr>
							<td colspan="3" align="center"><b36><b>บัญชีผู้ใช้</b></b36></td>
						</tr>
				</table>
				<table border="0">
						<?php
							$sql=" SELECT u.image, u.user_id, u.username, CONCAT(u.name, ' ', u.surname) as ns, u.address, d.district_name, a.amphur_name, p.province_name, z.zipcode_name, u.tel_number, u.email FROM user_account u
								  INNER JOIN tbl_districts d ON u.subdistrict = d.district_code
						     	  INNER JOIN tbl_amphures a ON u.district = a.amphur_id
								  INNER JOIN tbl_provinces p ON u.province = p.province_id
								  INNER JOIN tbl_zipcodes z ON u.post_code = z.zipcode_id
								  WHERE username = '$user2' ";
							$products = mysqli_query($connection,$sql);
							while($product = mysqli_fetch_array($products)) {
								echo "<tr><td valign='top' align='right'><img src='image/" . $product['image'] . "' width='150px' /> </td><td valign='top'>
								<table border=0>
								<tr><td align='right'><b>ชื่อผู้ใช้: </b></td><td>" . $product['username']. "</td></tr>" .
								"<tr><td align='right'><b>ชื่อ-นามสกุล : </b></td><td>" . $product['ns']. "</td></tr>" .
								"<tr><td align='right'><b>ที่อยู่ : </b></td><td>" . $product['address']. "</td></tr>" .
								"<tr><td align='right'><b>ตำบล/แขวง : </b></td><td>" . $product['district_name']. "</td></tr>" .
								"<tr><td align='right'><b>อำเภอ/เขต : </b></td><td>" . $product['amphur_name']. "</td></tr>" .
								"<tr><td align='right'><b>จังหวัด : </b></td><td>" . $product['province_name']. "</td></tr>" .
								"<tr><td align='right'><b>รหัสไปรษณีย์ : </b></td><td>" . $product['zipcode_name']. "</td></tr>" .
								"<tr><td align='right'><b>เบอร์โทรศัพท์ : </b></td><td>" . $product['tel_number']. "</td></tr>" .
								"<tr><td align='right'><b>อีเมล : </b></td><td>" . $product['email']. "</td></tr>" .
								"</td></tr> ";
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
</center>
</body>
</html>