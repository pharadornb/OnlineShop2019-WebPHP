<?php
	session_start();
	include("config.php");

	$username=$_POST['username'];
	$password2=md5($_POST['password']);

	if($username==''){
		echo "คุณยังไม่ได้กรอก Username ค่ะ";
	}else if($password=''){
		echo "คุณยังไม่ได้กรอก Password ค่ะ";
	}else{

		$sql="SELECT * FROM user WHERE Username='$username' AND Password='$password2';";
		$result=mysqli_query($connection,$sql);
		//นับผลลัพธ์
		$num=mysqli_num_rows($result);

		if($num<=0){
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
		}else{
			while ($user = mysqli_fetch_array($result)){
				if($user['Status_id'] == 2){
				echo $user["user_id"] . "<br />";
				echo $user["Status_id"] . "<br />";
				echo $user["Username"] . "<br />";
				echo $user["Password"] . "<br />";
				echo $username . "<br />";
				echo "Password: " . $password2 . "<br />";
				};
			}
		}
	}
?>