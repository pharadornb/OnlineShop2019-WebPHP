<?php
	include("config.php");
?>
<html>
<head>
  <title>สินค้าออนไลน์ G-404</title>
  <link rel="stylesheet" href="goods.css" type="text/css" />
  <link rel="shortcut icon" href="image/logo_title.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
<body>

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
							<td colspan="3" align="left"><div class="c"><b><b>สินค้าขายดี 3 อันดับแรก : </b></b></div></td>
						</tr>
					</table><br /><br/><br/>
					<table border="0">
						<tr>
						<?php
            $sql="SELECT product_code FROM products";
            $products = mysqli_query($connection, $sql);
            if(empty(mysqli_num_rows($products))){
              echo "<td> <b><b36>รายการสินค้าว่างครับ/ค่ะ</b36></b></td>";
            }else{
              $sql="SELECT p.product_img_name, p.product_name, COUNT(h.product_code) a, h.product_code
                FROM history_orders h
                LEFT JOIN products p ON h.product_code=p.product_code
                GROUP by product_code 
                HAVING a >= max(a) AND product_code NOT LIKE 'Test'
                LIMIT 3";
            $products = mysqli_query($connection, $sql);
              while($product = mysqli_fetch_array($products)) {
                echo "<td align='center'><img src='image/" . $product['product_img_name'] . "' width='150px' height='180px' /><b><b2><br/>" . $product['product_name'] . "</b></b2></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
              };
            }
						?>
					</tr>
					</table>
				</td>
			</tr>
      <?php
          include("footer.php");
        ?>
		</table>
</body>
</html>