<?php

 	include("config.php");

 	$username=$_POST["username"];
 	$password=$_POST["password"];
	$name=$_POST["name"];
	$surname=$_POST["surname"];
	$sex=$_POST["sex"];
 	$address=$_POST["address"];
 	$district=$_POST["district_name"];
 	$amphur=$_POST["amphur_name"];
 	$province=$_POST["province_name"];
 	$zipcode=$_POST["zipcode_name"];
 	$tel=$_POST["tel_number"];
	$email=$_POST["email"];

 	$sql="SELECT username FROM user_account WHERE username Like '".$_POST['username']."'";
 	$user=mysqli_query($connection,$sql);

 	if(mysqli_num_rows($user)){
 		echo "<script> alert('ชื่อผู้ใช้นี้มีอยู่แล้วในระบบโปรดกรอกใหม่!!!');window.location=index.php</script>";
 		echo "<meta http-equiv='refresh' content='1;URL=register_form.php'>";
 	}else{
 			if(empty($_FILES["file2"]["name"])){
 				echo "<script> alert('กรุณาเพิ่มรูปภาพของท่านด้วยค่ะได้ค่ะ');window.location=index.php</script>";
 				echo "<meta http-equiv='refresh' content='1;URL=register_form.php'>";
 			}else{
 				move_uploaded_file($_FILES["file2"]["tmp_name"], "image/" . $_FILES["file2"]["name"]);
 				$file2=$_FILES["file2"]["name"];

 			$sql="INSERT INTO user_account (user_id, username, password, status_id, name, surname, sex, address, subdistrict, district, province, post_code, tel_number, status_using_id, image, email) VALUES (NULL, '$username', MD5('$password'), '2', '$name', '$surname', '$sex', '$address', '$district', '$amphur', '$province', '$zipcode', '$tel', '0', '$file2', '$email')";

 		if(empty(mysqli_query($connection,$sql))){
 			echo "<script> alert('การสมัครสมาชิกล้มเหลวค่ะ/ครับ!');window.location=index.php</script>";
 			echo "<meta http-equiv='refresh' content='1;URL=register_form.php'>";

 		}else{
 			echo "<script> alert('บันทึกข้อมูลของท่านเสร็จสิ้นเข้าสู่ระบบได้ค่ะ');window.location=index.php</script>";
 			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";

 		}
 			}
 			
 	}
 ?>