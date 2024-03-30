<?php
//รับรหัสต้นไม้จากฟอร์ม
$fam_id = $_GET['fam_id'];

require 'dbconnect.php';

$sql = "DELETE FROM fam_data WHERE fam_id = '$fam_id'";

$result = mysqli_query($conn,$sql);

if($result){
    echo "ลบข้อมูลเรียบร้อยแล้ว";
}else{
    echo "เกิดข้อผิดพลาด".mysql_error($conn);
}

mysqli_close($conn);
?>