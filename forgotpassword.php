<?php
include("config.php");
if(isset($_POST['submit_forgotpassword']) && $_POST['email']!=""){
            $q="SELECT * FROM user_account WHERE  email='".addslashes(trim($_POST['email']))."' ";
            $qr=@mysqli_query($q);
            if(@mysqli_num_rows($qr)>0){
                    $rs=@mysqli_fetch_array($qr);
                    $reset_refer=md5(time());
                    @mysqli_query("
                    UPDATE  tuser_account SET 
                    reset_check='".$reset_refer."'
                    WHERE member_id='".$rs['member_id']."'
                    ");
                     
                    $htmlContact='<p>อีเมลล์แจ้งขอรับรหัสผ่านใหม่ กรณีลืมรหัสผ่าน และชื่อผู้ใช้ </p>
                    <p>คุณได้ทำการแจ้งลืมรหัสผ่าน และขอรับรห้สผ่านใหม่ ดังนี้</p>
                    <br />
                    ชื่อผู้ใช้ของคุณคือ :'.$rs['member_name'].'<br />
                    รีเซ็ตรหัสผ่านใหม่ <a href="http://www.example.com/new_password.php?refer='.$reset_refer.'"> http://www.example.com/new_password.php?refer='.$reset_refer.'</a><br />
                    <br />';          
                 
                    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
                //  $mail->IsSMTP(); // telling the class to use SMTP
                    $mail->IsMail(); // telling the class to use Mail() function             
                     
                     
                    try{
                        $mail->CharSet = "utf-8";            
                        $mail->AddAddress($rs['email'], 'ชื่อผู้รับ'); // ส่งถึง
                        $mail->SetFrom('B6134228@g.sut.ac.th', 'Example.com'); // ส่งจาก
                        $mail->AddReplyTo('B6134228@g.sut.ac.th', 'Example.com'); // ตอบกลับมาที่อีเมลล์
                    //  $mail->AddBCC('yorwebsitemail@gmail.com', 'Example.com');
                        $mail->Subject ="การแก้ไขเปลี่ยนแปลงรหัสผ่านใหม่";  //หัวเรื่องอีเมลล์
                        $mail->MsgHTML($htmlContact);  
                        $mail->Send();
                    }catch (phpmailerException $e){
                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
                    }catch (Exception $e) {
                        $msg_text="เกิดข้อผิดพลาดในการส่งอีเมลล์ กรุณาลองใหม่อีกครั้ง";
                    }               
                 
            }else{
                $msg_text="ไม่มีอีเมล ในระบบ กรุณาลองใหม่อีกครั้ง";
            }
}
 
?>