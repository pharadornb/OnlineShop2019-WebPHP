<tr>
			<td>
			<a href="admin.php"><img src="image/logo_size50.png" width="100" height="100" onmouseover="this.src='image/logo_size50-2.png'" onmouseout="this.src='image/logo_size50.png'"  /></a>
			</td>
		<form method="POST" action="admin.php">
			<td align="right"><input type="text" name="product_search" size="50" style="height:30px" placeholder="ค้นหา..."  />&nbsp;&nbsp;<input type="submit" name="search" value="Search" style="height:30px" /></td></form>
			<td>
				<table border="0" align="right">
					<tr>
						<td align="left" rowspan="2" >
							<?php
								while ($user = mysqli_fetch_array($result)){
									if($user['status_id'] == 1){
							?>
						<img src="image/<?php echo $user["image"];?>" width="100" />
						</td>
						<td align="center">
							
							<?php
										echo "<b1><b>" . $user["name"] . ' ' . $user["surname"] ."</b></b1><br />";
										echo "<b1>ผู้จัดการระบบ</b1>";
							?>
								<?php
									}
								}
							?>
						</td>
					</tr>
					<tr>
						<form action="logout.php" action="POST">
						<td align="center">
								<input type="submit" name="submit" value="ออกจากระบบ">
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>