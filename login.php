<?php
	session_start();
	include("config.php");

	$username=$_POST['username'];
	$password2=md5($_POST['password']);
	$_SESSION['user_username']=$username;
	$_SESSION['user_password']=$password2;

	if(empty($username)){
		echo "คุณยังไม่ได้กรอก Username ค่ะ";
	}else{

		$sql="SELECT * FROM user_account WHERE Username='$username' AND Password='$password2';";
		$rs=mysqli_query($connection,$sql);
		$num=mysqli_num_rows($rs);

		if($num<=0){
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
		}else{
			while ($user = mysqli_fetch_array($rs)) {
				//ผู้ดูแลระบบ
				if($user['status_id'] == 1){
					$_SESSION['user_id'] = session_id();
					$_SESSION['username']=$user['username'];
					$_SESSION['status']=1;

					echo "<meta http-equiv='refresh' content='1;URL=admin.php'>";
				}else{
					$_SESSION['user_id'] = session_id();
					$_SESSION['username']=$user['username'];
					$_SESSION['status']=2;
					//$_SESSION['status2']=$user['status_using_id'];

					echo "<meta http-equiv='refresh' content='1;URL=user.php'>";
				};
			}
		}
	}
?>