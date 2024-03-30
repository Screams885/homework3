<?php

$fam_name =$_POST['fam_name'];

require 'dbconnect.php';

$sql="INSERT INTO fam_data (fam_name) VALUES ('$fam_name')";

$result = mysqli_query($conn,$sql);

if($result){
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
}else{
    echo "เกิดข้อผิดพลาด".mysql_error($conn);
}

//5.ปิดการเชื่อมต่อ
mysqli_close($conn);
?>