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
//สำหรับนำข้อมูลจากแบบฟอร์ม db_insert_form.php บันทึกลงตาราง treedata
//1.รับค่าจากฟอร์ม (1)

$c_name = $_POST['c_name'];
$s_name = $_POST['s_name'];
$fam_id = $_POST['fam_id'];
$leaf_type = $_POST['leaf_type'];
$ct = $_POST['ct'];

//การแปลงตัวเลือกการขยายพันธุ์ในรูปแบบ array ให้อยู่ในรูปของ text ขั้นด้วยเครื่องหมาย comma
$propagation = implode(",",$_POST['propagation']);

$prov_id = $_POST['prov_id'];

//การตั้งชื่อไฟล์และ path ในการเก็บข้อมูล

//คำสั่งเพื่อดึงนามสกุลไฟล์ภาพออกมาจากไฟล์ที่ผู้ใช้ upload มา แล้วส่งไปไว้ที่ตัวแปร $ext
$ext = pathinfo(basename($_FILES['tree_image']['name']),PATHINFO_EXTENSION);

//ตั้งชื่อไฟล์ใหม่ ขึ้นต้นด้วย img_ ต่อด้วยชื่อสุ่มด้วยคำสั่ง uniqid เอานามสกุลที่เก็บไว้มาต่อ
$new_image_name = 'img_'.uniqid().".".$ext;

//กำหนดเส้นทางไปยัง folder ในที่นี่สร้าง folder ชื่อ "images" ไว้เพื่อเก็บไฟล์ภาพ
$image_path = "images/";

//เชื่อมต่อเส้นทางและชื่อไฟล์ใหม่เข้าด้วยกัน
$upload_path =$image_path.$new_image_name;

//upload ไฟล์ไปไว้ใน "images" ด้วยคำสั่ง move_uploaded_file()
$success = move_uploaded_file($_FILES['tree_image']['tmp_name'],$upload_path);

//ตรวจสอบว่า upload สำเร็จหรือไม่ ถ้าไม่ได้ให้แจ้งผู้ใช้
if($success==FALSE){
    echo "ไม่สามารถอัพโหลดรูปภาพได้";
    exit();
}

//ส่งชื่อรูปภาพใหม่พร้อม path ที่ได้ไปไว้ในตัวแปร $tree_image ที่จะส่งไปเก็บในตารางข้อมูล
$tree_image = $new_image_name;

//2.เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

//3.กำหนดคำสั้ง MySQL เพื่อแทรกข้อมูล (2)
$sql = "INSERT INTO treedata (c_name, s_name, fam_id, leaf_type , ct, propagation, prov_id, photo) VALUES ('$c_name', '$s_name', '$fam_id','$leaf_type' ,'$ct','$propagation', '$prov_id', '$tree_image')";

//4.run command MySQL ในขั้นตอนที่ 3
$result = mysqli_query($conn,$sql);

//แจ้งผลการแทรกข้อมูล
if($result){
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
}else{
    echo "เกิดข้อผิดพลาด".mysql_error($conn);
}
//5.ปิดการเชื่อมต่อ
mysqli_close($conn);
?>