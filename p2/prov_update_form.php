<?php
//แก้ไขข้อมูล

//เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

//รับค่าจากฟอร์ม
$prov_id = $_GET['prov_id'];

//กำหนดคำสั่ง MySQL เพืื่อเรียกข้อมูลที่มีค่า tree_id ตรงกับผู้ใช้เลือก
$sql= "SELECT * from prov_data WHERE prov_id ='$prov_id'";

//สั่งให้คำสั่ง $sql ทำงาน
$result = mysqli_query($conn,$sql);

//ดึงข้อมูล array มาจากตัวแปร $result
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แทรกข้อมูลต้นไม้</title>
</head>
<body>
<h2>แทรกข้อมูลต้นไม้</h2>
<form action=prov_update.php method="post">
  <label for="prov_id">รหัสจังหวัด</label><br>
  <input type="text" id="prov_id" name="prov_id" value="<?php echo $row['prov_id']?>"><br>
  <label for="prov_name">ชื่อจังหวัด</label><br>
  <input type="text" id="prov_name" name="prov_name" value="<?php echo $row['prov_name']?>"><br>
  <label for="region">ภาค</label><br>
  <input type="text" id="region" name="region" value="<?php echo $row['region']?>"><br>
  <p><input type="submit" value="แทรกข้อมูล">
</form>
</body>
</html>