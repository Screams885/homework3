
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="http://localhost/p2/dbshow.php">HOME</a><p>
</body>
</html>

<?php
//รับข้อมูลจากฟอร์ม (1)
$tree_id = $_POST['tree_id'];
$c_name = $_POST['c_name'];
$s_name = $_POST['s_name'];
$fam_id = $_POST['fam_id'];
$leaf_type = $_POST['leaf_type'];
$ct = $_POST['ct'];

//การแปลงตัวเลือกการขยายพันธุ์ในรูปแบบ array ให้อยู่ในรูปของ text ขั้นด้วยเครื่องหมาย comma
$propagation = implode(",",$_POST['propagation']);

$prov_id = $_POST['prov_id'];

//รับชื่อไฟล์เก่าไว้ใช้กรณีไม่มีการเปลี่ยนรูป
$tree_image_old = $_POST['tree_image_old'];

//ตั้งชื่อไฟล์ใหม่ กรณีเปลี่ยนรูป
$ext = pathinfo(basename($_FILES['tree_image']['name']),PATHINFO_EXTENSION);
$new_image_name = 'img_'.uniqid().".".$ext;
$image_path = "images/";
$upload_path =$image_path.$new_image_name;
$success = move_uploaded_file($_FILES['tree_image']['tmp_name'],$upload_path);
$tree_image = $new_image_name;

require 'dbconnect.php';

//ลบไฟล์ภาพเดิม กรณีมีการเปลี่ยนภาพใหม่
if(!empty($_FILES['tree_image']['tmp_name'])){
    $filename = $tree_image_old;
    @unlink('images/'.$filename);

///ตั้งคำสั่ง MySQL กรณีเปลี่ยนไฟล์ภาพใหม่
    $sql = "UPDATE treedata SET tree_id='$tree_id', c_name='$c_name', s_name='$s_name', fam_id ='$fam_id', prov_id='$prov_id',ct ='$ct',leaf_type='$leaf_type', propagation='$propagation', photo='$tree_image' WHERE tree_id= '$tree_id'";
}else{
    //ตั้งคำสั่ง MySQL กรณีใช้ไฟล์ภาพเดิม
    $sql = "UPDATE treedata SET tree_id='$tree_id', c_name='$c_name', s_name='$s_name', fam_id ='$fam_id', prov_id='$prov_id',ct ='$ct',leaf_type='$leaf_type', propagation='$propagation', photo='$tree_image_old' WHERE tree_id= '$tree_id'";
}

//สั่งให้คำสั่ง sql ทำงาน
$result = mysqli_query($conn,$sql);

//แจ้งผลการปรับปรุงข้อมูล
if($result){
    echo "ปรับปรุงเรียบร้อยแล้ว";
}else{
    echo "เกิดข้อผิดพลาด".mysql_error($conn);
}

//5.ปิดการเชื่อมต่อ
mysqli_close($conn);

?>
