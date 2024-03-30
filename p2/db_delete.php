<?php
//รับรหัสต้นไม้จากฟอร์ม
$tree_id = $_GET['tree_id'];

//เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

//กำหนดคำสั่ง SQL เพื่อเรียกชื่อไฟล์ภาพมาจากฐานข้อมูล เพื่อลบไฟล์ภาพออกจากเครื่อง
$sql_del = "SELECT photo FROM treedata WHERE tree_id='$tree_id'";
$result_del = mysqli_query($conn,$sql_del);
$row = mysqli_fetch_array($result_del, MYSQLI_NUM);
$filename = $row[0];

//ลบไฟล์ภาพจาก folder "images"
@unlink('images/'.$filename);

//กำหนดคำสั่ง sql เพื่อลบ้อมูล แถวที่ต้องการ
$sql ="DELETE FROM treedata WHERE tree_id = '$tree_id'";

//รันคำสั่ง sql
$result = mysqli_query($conn,$sql);

//แจ้งผลการลบข้อมูล
if($result){
    echo "ลบข้อมูลเรียบร้อยแล้ว";
}else{
    echo "เกิดข้อผิดพลาด".mysqli_error($conn);
}
//ปิดการเชื่อมต่อ
mysqli_close($conn);
?>