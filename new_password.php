<form id="form2" name="form2" method="post" action="reset_password.php" >
    <label for="email" >กรอกรหัสผ่านใหม่</label>
      <input type="password" name="new_password" autocomplete="off" id="new_password" placeholder="กรอกรหัสผ่านใหม่ ที่ต้องการ" value="">
      <button type="submit" id="submit_resetpassword" value="รีเซ็ตรหัสผ่าน" name="submit_resetpassword" >รีเซ็ตรหัสผ่าน</button>
      <input name="h_refer" type="hidden" id="h_refer" value="<?=trim($_GET['refer'])?>">
 
</form>