<tr bgcolor="white">
				  <td align="center">
				  <a href="index.php"><img src="image/logo_size50.png" width="100" height="100" onmouseover="this.src='image/logo_size50-2.png'" onmouseout="this.src='image/logo_size50.png'" /></a> </td>

				<td align="center">
					<form method="POST" name="searching" action="searching.php" onSubmit="return check_search();">&nbsp;&nbsp;
					<input type="text" name="product_search" size="50" style="height:30px" placeholder="ค้นหา..."  />&nbsp;&nbsp;<input type="submit" name="search" value="Search" style="height:30px" />
					</form>
				</td>

				<td>
					<table border="0" cellspacing="3" align="center">
						<form method="POST" name="frmlogin" action="login.php" onSubmit="return check_input();">
						<tr>
							<td align="right"><b1><b>ชื่อผู้ใช้ : </b></b1></td>
							<td><input type="text" name="username" size="15" /></td>
						</tr>
						<tr>
							<td><b1><b>รหัสผ่าน : </b></b1></td>
							<td><input type="password" name="password" size="15"  /></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" name="login" value="เข้าสู่ระบบ" />
							<a href="resetpassword.php"><b1>ลืมรหัสผ่าน</b1></a></td>
						</tr>
						</form>
						<tr>
							<form method="POST" action="register_form.php">
							<td colspan="2"><center><input type="submit" name="register" value="สมัครสมาชิก" /></center></td>
							</form>
						</tr>
					</table>
				</td>
			</tr>