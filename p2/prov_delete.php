<?php
$prov_id = $_GET['prov_id'];

require 'dbconnect.php';

$sql = "DELETE FROM prov_data WHERE prov_id = '$prov_id'";

$result = mysqli_query($conn,$sql);

if($result){
    echo "ลบข้อมูลเรียบร้อยแล้ว";
}else{
    echo "เกิดข้อผิดพลาด".mysql_error($conn);
}

mysqli_close($conn);
?>




