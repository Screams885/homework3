<?php

$fam_id = $_POST['fam_id'];
$fam_name = $_POST['fam_name']

require 'dbconnect.php';

$sql = "UPDATE fam_data SET fam_id='$fam_id', fam_name='$fam_name' WHERE fam_id='$fam_id'";

$result == mysqli_query($conn,$sql);

if($result){
    echo "ปรับปรุงเรียบร้อยแล้ว";
}else{
    echo "เกิดข้อผิดพลาด".mysql_error($conn);
}

//5.ปิดการเชื่อมต่อ
mysqli_close($conn);

?>