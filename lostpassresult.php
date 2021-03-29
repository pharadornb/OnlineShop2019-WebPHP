<?php  
include("config.php");  
$memberemail=$_POST['memberemail'];
$memberuser=$_POST['memberuser'];
$rs=mysqli_query($connection,"SELECT email from user_account where email='$memberemail' AND username='$memberuser'");   
if(!empty(mysqli_num_rows($rs))) {  
$newpass=rand(10000000,99999999);  // ทำการสุ่มสร้างรหัสใหม่   
$newpass_md5=md5($newpass);  // แปลงเป็น md5 เพื่อบันทึกลงเบส

mysqli_query($connection,"UPDATE user_account SET password='$newpass_md5' where email='$memberemail' AND username='$memberuser'");  // บันทึกรหัสใหม่ลงฐานข้อมูล  
  
$emailadmin= "bomstudy2542@gmail.com";  // เมลคนส่ง    
$sendto = $memberemail;    
            
        $mailheaders = "From: " . $emailadmin . "\n";    
        $mailheaders .= "Content-type: text/html;charset=UTF-8\n";    
        $mailheaders .= "X-Priority: 1\n";    
        $mailheaders .= "Importance: High\n";    
        $mailheaders .= "X-MSMail-Priority: High\n";    
        $mailheaders .= "X-Mailer: Mailler With PHP!\n";    
    
        $mailsubject = "รหัสผ่านใหม่";    
            
        $body = "<html> <body>";
        $body .= "รหัสผ่านใหม่ของคุณคือ ".$newpass;    
        $body .= "</body>";    
        $body .= "</html>";               
       @mail($sendto, $mailsubject, $body, $mailheaders);

       echo "<script> alert('กรุณาไปรับรหัสผ่านใหม่ ที่อีเมล์ของท่าน');window.location=index.php</script>";
       echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
    }else{
        echo "<script> alert('ไม่มีอีเมลหรือชื่อผู้ใช้นี้ในระบบ โปรดกรอกใหม่อีกครั้งค่ะ/ครับ');window.location=index.php</script>";
        echo "<meta http-equiv='refresh' content='1;URL=resetpassword.php'>";
    }
?>