<?php
	session_start();
	include("config.php");
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>เพิ่มสินค้า</title>
  <link rel="stylesheet" href="goods.css" type="text/css" />
  <link rel="stylesheet" href="table6.css" type="text/css" />
  <link rel="shortcut icon" href="image/logo_title.ico" />

  <script language="javascript">
  function check_add(){
    
  if(document.add.goods_code.value == "")
  {
    alert('กรุณากรอกรหัสสินค้าด้วยค่ะ/ครับ...');
    document.add.goods_code.focus();
    return false;
  } 
  if(document.add.goods_name.value == "")
  {
    alert('กรุณากรอกชื่อสินค้าด้วยค่ะ/ครับ...');
    document.add.goods_name.focus();    
    return false;
  } 
  if(document.add.comment.value == "")
  {
    alert('กรุณากรอกรายละเอียดสินค้าด้วยค่ะ/ครับ...');
    document.add.comment.focus();    
    return false;
  }
  if(document.add.file1.value == "")
  {
    alert('กรุณาเพิ่มรูปภาพด้วยค่ะ/ครับ...');
    document.add.file1.focus();    
    return false;
  } 
  if(document.add.goods_price.value == "")
  {
    alert('กรุณากรอกราคาสินค้าด้วยค่ะ/ครับ...');
    document.add.goods_price.focus();    
    return false;
  } 
  if(document.add.goods_catalog.value == "")
  {
    alert('กรุณาเลือกประเภทสินค้าด้วยค่ะ/ครับ...');
    document.add.goods_catalog.focus();    
    return false;
  } 
  document.frmlogin.submit();
}
</script>

  <style type="text/css">
  textarea{
    font-family: myFirstFont;
    font-size: 18px;
  }

select{
  font-family: myFirstFont;
  font-size: 18px;
}

option{
  font-family: myFirstFont;
  font-size: 18px;
}


</style>
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
            <a href="admin_orders_send.php">สินค้ารอการจัดส่ง</a>
        </div>
			</td>
		</tr>
        <tr>
            <td colspan="3" align="center">
              <br />
                <b36><b>เพิ่มสินค้า</b></b36>
            </td>
        </tr>
        <form action="add_good_dB.php" method="POST" enctype="multipart/form-data" onSubmit="return check_add();" name="add">
        <tr>
            <td colspan="3" align="center">
                <table border="0" cellspacing="10" >
                    <tr>
                        <td align="right">
                            <bb>รหัสสินค้า : </bb>
                        </td>
                        <td>
                            <input type="text" name="goods_code" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <bb>ชื่อสินค้า : </bb>
                        </td>
                        <td>
                            <input type="text" name="goods_name" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <bb>รายละเอียดสินค้า:</bb>
                        </td>
                        <td>
                            <textarea rows="4" cols="30" name="comment"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <bb>รูปภาพสินค้า:</bb>
                        </td>
                        <td>
                            <input type="file" name="file1" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <bb>ราคาสินค้า:</bb>
                        </td>
                        <td>
                            <input type="text" name="goods_price" /> บาท
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <bb>สินค้าคงคลัง:</bb>
                        </td>
                        <td>
                            <input type="text" name="goods_stock" size="4" value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <bb>หมวดหมู่ของสินค้า:</bb>
                        </td>
                        <td>
                        <select name="goods_catalog">
                            <option value="0">----โปรดเลือก----</option>
                            <option value="1">สินค้าเบ็ดเตล็ด/ทั่วไป</option>
                            <option value="2">สินค้าอุปโภค/บริโภค</option>
                            <option value="3">สินค้าเทคโนโลยีและอิเล็กทรอนิกส์</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2 align="center">
                             <input type="submit" name="submit" value="เพิ่มสินค้า" />
                             <input type="reset" name="reset" value="รีเซ็ตข้อมูล" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </form>
    <?php
          include("footer.php");
        ?>
	<?php	
	}
	?>
</body>
</html>


