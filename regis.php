<script language="javascript">
function check_reg()
{
  if(document.register.username.value == "")
  {
    alert('กรุณากรอกชื่อผู้ใช้ด้วยค่ะ/ครับ...');
    document.register.username.focus();
    return false;
  } 
  if(document.register.password.value == "")
  {
    alert('กรุณากรอกรหัสผ่านด้วยค่ะ/ครับ...');
    document.register.password.focus();    
    return false;
  } 
  if(document.register.name.value == "")
  {
    alert('กรุณากรอกชื่อจริง/ครับ...');
    document.register.name.focus();    
    return false;
  } 

  if(document.register.surname.value == "")
  {
    alert('กรุณากรอกนามสกุลด้วยค่ะ/ครับ...');
    document.register.surname.focus();    
    return false;
  } 

if(document.register.birth_of_day.value == "")
  {
    alert('กรุณาเลือกว/ด/ป.เกิดด้วยค่ะ/ครับ...');
    document.register.birth_of_day.focus();    
    return false;
  }

 if(document.register.address.value == "")
  {
    alert('กรุณากรอกบ้านเลขที่+หมู่ที่+ชื่อหมู่บ้านด้วยค่ะ/ครับ...');
    document.register.address.focus();    
    return false;
  } 

  if(document.register.province_name.value == "")
  {
    alert('กรุณาเลือกจังหวัดของท่านด้วยค่ะ/ครับ...');
    document.register.province_name.focus();    
    return false;
  } 

if(document.register.amphur_name.value == "")
  {
    alert('กรุณาเลือกอำเภอของท่านด้วยค่ะ/ครับ...');
    document.register.amphur_name.focus();    
    return false;
  } 

if(document.register.district_name.value == "")
  {
    alert('กรุณาเลือกตำบลของท่านด้วยค่ะ/ครับ...');
    document.register.district_name.focus();    
    return false;
  } 

if(document.register.zipcode_name.value == "")
  {
    alert('กรุณาเลือกรหัสไปรษณีย์ของท่านด้วยค่ะ/ครับ...');
    document.register.zipcode_name.focus();    
    return false;
  } 


if(document.register.tel_number.value == "")
  {
    alert('กรุณากรอกเบอร์โทรของท่านด้วยค่ะ/ครับ...');
    document.register.tel_number.focus();    
    return false;
  } 

if(document.register.email.value == "")
  {
    alert('กรุณาอีเมลด้วยค่ะ/ครับ...');
    document.register.surname.focus();    
    return false;
  } 
  document.register.submit();
}

</script>

<script type="text/javascript">
function autoTab2(obj,typeCheck){
    /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
    หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
    4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
    รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
    หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
    ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
    */
        if(typeCheck==1){
            var pattern=new String("_-____-_____-_-__"); // กำหนดรูปแบบในนี้
            var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้     
        }else{
            var pattern=new String("__-____-____"); // กำหนดรูปแบบในนี้
            var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้                 
        }
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}
</script>
