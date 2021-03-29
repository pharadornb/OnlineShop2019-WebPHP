<?php
    include("db_connect.php");
    $mysqli = connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สมัครสมาชิก</title>
    <link rel="shortcut icon" href="image/logo_title.ico" />
    <link rel="stylesheet" href="ruknaja.css">
    <link rel="stylesheet" href="test4.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <?php
        include("regis.php");
    ?>
    
</head>
<body bgcolor="white">
 
<div class="container" style="width:300px;">
 <form method="POST" action="register.php" enctype="multipart/form-data" name="register" onSubmit="return check_reg();">
<table class="table table-striped" style="width:300px;">
   <tr class="active">
       <td colspan="2" class="text-center">
           <b><h1><b>สมัครสมาชิก</b></h1></b>
       </td>
   </tr>
                <tr>
                    <td align="right"><b1><b>Username : </b></b1></td>
                    <td ><input type="text" name="username" placeholder="แนะนำ!ตัวอักษร+ตัวเลข" /><bred>*บังคับพิเศษ</bred></td>
                </tr>

                <tr>
                    <td align="right"><b1><b>Password : </b></b1></td>
                    <td><input type="password" name="password" placeholder="แนะนำ!ตัวเลข+ตัวอักษร 1 ตัว" /><bred>*บังคับพิเศษ</bred></td>
                </tr>

                <tr>
                    <td align="right"><b1><b>ชื่อ : </b></b1></td>
                    <td><input type="text" name="name" placeholder="แนะนำ!ไม่ต้องมีคำนำหน้า"/></td>
                </tr>

                <tr>
                    <td align="right"><b1><b>นามสกุล : </b></b1></td>
                    <td><input type="text" name="surname" /></td>
                </tr>

                <tr>
                    <td align="right"><b1><b>เพศ : </b></b1></td>
                    <td><input type="radio" name="sex" value="ชาย" /><b1>&nbsp;&nbsp;ชาย</b1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="หญิง" /><b1>&nbsp;&nbsp;หญิง</b1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="อื่นๆ" checked= /><b1>&nbsp;&nbsp;อื่นๆ</b1></td>
                </tr>

                <tr valign="top" align="right">
                    <td><b1><b>ที่อยู่: </b></b1></td>
                    <td align="left">
                        <textarea name="address" cols="30" placeholder="แนะนำ!บ้านเลขที่ + หมู่ที่ + ชื่อหมู่บ้าน"></textarea>
                    </td>
                </tr>

    <tr>
        <td width="100" class="text-right">
            <font color="black"><b1><b>Province</b></b1></font>
        </td>
        <td class="text-left">
            <select name="province_name" data-where="2" class="ajax_address form-control input-sm">
                <option value="">-- เลือกจังหวัด --</option>
            </select>
        </td>        
    </tr>
    <tr>
        <td class="text-right">
            <b1><b>District<b></b1>
        </td>
        <td class="text-left">
            <select name="amphur_name" data-where="3" class="ajax_address form-control input-sm">
                <option value="">-- เลือกอำเภอ/เขต --</option>
            </select>
            
        </td>        
    </tr>    
    <tr>
        <td class="text-right">
            <b1><b>Subdistrict</b></b1>
        </td>
        <td class="text-left">
            <select name="district_name" data-where="4" class="ajax_address form-control input-sm">
                <option value="">-- เลือกตำบล/แขวง --</option>
            </select>
        </td>        
    </tr>   
    <tr>
        <td class="text-right">
            <b><b1>Post code
</b1></b>        </td>
        <td class="text-left">
            <select name="zipcode_name" data-where="5" class="ajax_address form-control input-sm">
                <option value="">-- เลือกรหัสไปรษณีย์ --</option>
            </select>
        </td>        
    </tr>
    <tr>
                    <td align="right"><b1><b>Tel/Mobile: </b></b1></td>
                    <td><input type="text" name="tel_number" onkeyup="autoTab2(this,2)" />
                </tr>

                <tr>
                    <td align="right"><b1><b>อีเมล: </b></b1></td>
                    <td><input type="email" name="email" /><bred>*บังคับพิเศษ</bred></td>
                </tr>

                <tr>
                    <td align="right"><b1><b>รูปภาพ: </b></b1></td>
                    <td><input type="file" name="file2" /></td>
                </tr>

                    <td colspan="2" align="center">
                        <input type="submit" value="สมัครสมาชิก" name="submit" />
                        <input type="reset" value="กรอกใหม่" name="reset" />
                    </td>
                </tr>           
</table>
</form>    
</div>        
     
<script type="text/javascript">
$(function(){
     
    // เมื่อโหลดขึ้นมาครั้งแรก ให้ ajax ไปดึงข้อมูลจังหวัดทั้งหมดมาแสดงใน
    // ใน select ที่ชื่อ province_name 
    // หรือเราไม่ใช้ส่วนนี้ก็ได้ โดยไปใช้การ query ด้วย php แสดงจังหวัดทั้งหมดก็ได้
    $.post("getAddress.php",{
        IDTbl:1
    },function(data){
        $("select[name=province_name]").html(data);    
    });
     
    // สร้างตัวแปร สำหรับเก็บค่าข้อความให้เลือกรายการ เช่น เลือกจังหวัด
    // เราจะเก็บค่านี้ไว้ใช้กรณีมีการรีเซ็ต หรือเปลี่ยนแปลงรายการใหม่
    var chooseText=[];
    $(".ajax_address").each(function(i,k){
        var initObj=$(".ajax_address").eq(i).find("option:eq(0)")[0];
        chooseText[i]=initObj;
    });
     
    // ส่วนของการตรวจสอบ และดึงข้อมูล ajax สังเกตว่าเราใช้ css คลาสชื่อ ajax_address
    // ดังนั้น css คลาสชื่อนี้จำเป็นต้องกำหนด หรือเราจะเปลี่ยนเป็นชื่ออื่นก็ได้ แต่จำไว้ว่า
    // ต้องเปลี่ยนในส่วนนี้ด้วย
    $(".ajax_address").on("change",function(){
        var indexObj = $(".ajax_address").index(this); // เก็บค่า index ไว้ใช้งานสำหรับอ้างอิง
        // วนลูปรีเซ็ตค่า select ของแต่ละรายการ โดยเอาค่าจาก array ด้านบนที่เราได้เก็บไว้
        $(".ajax_address").each(function(i,k){
            if(i>indexObj){ // รีเซ็ตค่าของรายการที่ไม่ได้เลือก
                $(".ajax_address").eq(i).html(chooseText[i]);
            }
        });
         
        var obj=$(this);        
        var IDCheck=obj.val();  // ข้อมูลที่เราจะใช้เช็คกรณี where เช่น id ของจังหวัด
        var IDWhere=obj.data("where"); // ค่าจาก data-where ค่าน่าจะเป็นตัวฟิลด์เงื่อนไขที่เราจะใช้
        var targetObj=$("select[data-where='"+(IDWhere+1)+"']"); // ตัวที่เราจะเปลี่ยนแปลงข้อมูล
        if(targetObj.length>0){ // ถ้ามี obj เป้าหมาย
            targetObj.html("<option>.. กำลังโหลดข้อมูล.. </option>");  // แสดงสถานะกำลังโหลด  
            setTimeout(function(){ // หน่วงเวลานิดหน่อยให้เห็นการทำงาน ตัดเออกได้
                // ส่งค่าไปทำการดึงข้อมูล option ตามเงื่อนไข
                 $.post("getAddress.php",{
                    IDTbl:IDWhere,
                    IDCheck:IDCheck,
                    IDWhere:IDWhere-1
                },function(data){
                    targetObj.html(data);   // แสดงค่าผลลัพธ์
                });    
            },1500);
        }
    });
     
});
</script>    
 
     
</body>
</html>