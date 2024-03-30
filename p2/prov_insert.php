<?php

$prov_name =$_POST['prov_name'];
$region =$_POST['region'];

require 'dbconnect.php';

$sql="INSERT INTO prov_data (prov_name, region) VALUES ('$prov_name','$region')";

$result = mysqli_query($conn,$sql);

if($result){
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
}else{
    echo "เกิดข้อผิดพลาด".mysql_error($conn);
}

//5.ปิดการเชื่อมต่อ
mysqli_close($conn);
?>