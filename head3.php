		<tr>
			<td><a href="user.php"><img src="image/logo_size50.png" width="100" height="100" onmouseover="this.src='image/logo_size50-2.png'" onmouseout="this.src='image/logo_size50.png'"/></a></td>

			<form method="POST" action="user.php">
			<td align="center"><input type="text" name="product_search" size="50" style="height:30px" placeholder="ค้นหา..."  />&nbsp;&nbsp;<input type="submit" name="search" value="Search" style="height:30px" /></td></form>

			<td>
				<table border=0 align="right">
					<tr>
						<td align="left" rowspan=2>
						<?php
								while ($user = mysqli_fetch_array($result)){
									if($user['status_id'] == 2){
							?>
						<img src="image/<?php echo $user["image"];?>" width="100" />
						</td>
						<td align="center">
							<?php 
										echo "<b>" . $user["name"] . ' ' . $user["surname"] ."</b><br />";
										echo "ลูกค้าทั่วไป";
							?>
							<?php
									}
							?>
						</td>
					</tr>
					<tr>
						<td align="center">
							<form action="logout.php" action="POST">
								<input type="submit" name="submit" value="logout">
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<marquee direction="left">
					<?php
							echo "<b20>ยินดีต้อนรับคุณลูกค้า: <b>" . $user["name"] . ' ' . $user["surname"] ."</b> ด้วยความยินดียิ่งช้อปให้สนุกน่ะครับ/ค่ะ</b20>";
						}
					?>
					</marquee>
				</td>
			</form>
		</tr>