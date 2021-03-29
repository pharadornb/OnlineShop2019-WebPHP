<html>
<head>
	<title>ลืมรหัสผ่าน</title>
	<link rel="shortcut icon" href="image/logo_title.ico" />
	<link rel="stylesheet" href="goods.css" type="text/css" />

	<script language="javascript">
  function check_input(){
    if(document.lostpassresult.memberemail.value == "" && document.lostpassresult.memberuser.value == "")
  {
    alert('กรุณากรอกอีเมลและชื่อผู้ใช้ของท่านด้วยค่ะ/ครับ...');
    document.lostpassresult.memberemail.focus();
    return false;
  } 
  if(document.lostpassresult.memberemail.value == "")
  {
    alert('กรุณากรอกอีเมลด้วยค่ะ/ครับ...');
    document.lostpassresult.memberemail.focus();
    return false;
  } 
  if(document.lostpassresult.memberuser.value == "")
  {
    alert('กรุณากรอกชื่อผู้ใช้ด้วยค่ะ/ครับ...');
    document.lostpassresult.memberuser.focus();    
    return false;
  } 
  document.lostpassresult.submit();
}
</script>

</head>
<body>
	<form action="lostpassresult.php" method="POST" name="lostpassresult" onSubmit="return check_input();">
		<table border="0" align="center" cellpadding="5">
			<tr>
				<td><b2><font color= "white">E-mail :</font></b2></td>
				<td><input type="email" name="memberemail" size="30" required><br>  </td>
			</tr>
			<tr>
				<td><b2><font color= "white">ชื่อผู้ใช้ :</font></b2></td>
				<td><input type="text" name="memberuser" size="20" required><br>  </td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="ขอรหัสผ่าน"></td>
			</tr>   
		</table>   
</form>
</body>
</html>