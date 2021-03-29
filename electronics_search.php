<?php
	include("config.php");
?>
<html>
<head><title>สินค้าอิเล็กทรอนิกส์และเทคโนโลยี</title>
	<link rel="shortcut icon" href="image/logo_title.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="goods.css" type="text/css" />
  <link rel="stylesheet" href="table4.css" type="text/css" />

  <script language="javascript">
  function check_input(){
    if(document.frmlogin.username.value == "" && document.frmlogin.password.value == "")
  {
    alert('กรุณากรอกชื่อผู้ใช้และรหัสผ่านด้วยค่ะ/ครับ...');
    document.frmlogin.username.focus();
    return false;
  } 
  if(document.frmlogin.username.value == "")
  {
    alert('กรุณากรอกชื่อผู้ใช้ด้วยค่ะ/ครับ...');
    document.frmlogin.username.focus();
    return false;
  } 
  if(document.frmlogin.password.value == "")
  {
    alert('กรุณากรอกรหัสผ่านด้วยค่ะ/ครับ...');
    document.frmlogin.password.focus();    
    return false;
  } 
  document.frmlogin.submit();
}
</script>

</head>
<body >
	<!--<form method="POST" action="login.php">-->
		<table border="0" align="center" width="60%" bordercolor="grey" bgcolor="white">
			<?php
          include("head.php");
          include("slide.php");
        ?>
        <tr>
        <td colspan="3">
          <table border="0" align="center" width="100%">
            <tr>
              <td align="left">
                <div class="c"><b>หมวดหมู่ของสินค้า : </b></div>
              </td>
            </tr>
            <tr>
              <td align="center">
                <table border="0">
                  <tr>
                    <td><a href="betlet_search.php"><button class="button button1"><img src="image/basket.png" width="50px" height="50px"/>&nbsp;<b2>เบ็ดเตล็ดและทั่วไป</b2></button></a></td>
                    <td><a href="foods_search.php"><button class="button button3"><img src="image/tuna.png" width="50px" height="50px"/>&nbsp;&nbsp;<b2>อุปโภคและบริโภค</b2></button></a></td>
                    <td><a href="electronics_search.php"><button class="button button2"><img src="image/computer.png" width="50px" height="50px"/>&nbsp;&nbsp;<b2>อิเล็กทรอนิกส์และเทคโนโลยี</b2></button></a></td>
                  </tr>

                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
			<tr>
				<td colspan="3" align="center">
					<table border="0" align="left">
						<tr>
							<td colspan="3" align="left"><div class="c"><b><b>สินค้าประเภทอิเล็กทรอนิกส์และเทคโนโลยี : </b></b></div></td>
						</tr>
					</table><br /><br/><br/>
					<table border="1" id="customers">
            <tr>
              <th>รหัสสินค้า</th>
              <th>ชื่อสินค้า</th>
              <th>รายละเอียดสินค้า</th>
              <th>ราคา</th>
              <th>รูปภาพสินค้า</th>
            </tr>
						<?php
						$sql="SELECT * FROM products WHERE product_catalog_id=3 AND product_stock > 0 ORDER BY product_code";
						$products = mysqli_query($connection, $sql);
            if(empty(mysqli_num_rows($products))){
              echo "<tr><td colspan='5' align='center'><b><b36>ยังไม่สินค้าในหมวดหมู่นี้ครับ/ค่ะ</b36></b></tr></td>";
            }else{
							while($product = mysqli_fetch_array($products)) {
								echo "<tr> <td align='center'>" . $product['product_code'] . "</td>". "<td align='center' >" . $product['product_name'] . "</td>" . "<td align='left'>" . $product['product_desc'] . "</td>" . "<td align='center'>" . $product['product_price'] . "<td align='center'> <img src='image/" . $product['product_img_name']  . " ' width='150px' /></td>" . "</td>" . "</tr>";
							};
            }
						?>
					</table>
				</td>
			</tr>
			<?php
          include("footer.php");
        ?>
		</table>
</body>
</html>