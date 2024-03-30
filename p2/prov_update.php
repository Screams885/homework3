<?php
//รับข้อมูลจากฟอร์ม
$prov_id = $_POST['prov_id'];
$prov_name = $_POST['prov_name'];
$region = $_POST['region'];

//
require 'dbconnect.php';

//ตั้งคำสั่ง MySQL เพื่อปรับปรุงข้อมูล
$sql = "UPDATE prov_data SET prov_id='$prov_id', prov_name='$prov_name', region='$region' WHERE prov_id= '$prov_id'";

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