<?php
//1. เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

//2. เรียกสืบค้น
$sql = "SELECT * FROM prov_data";
$result = mysqli_query($conn,$sql);     //สั่งให้คำสั่ง SQL ในตัวแปร $sql ทำงาน

//3. การแสดงผล

?>

<style>
table, th, td {
  border: 1px solid;
}
</style>

<table>
<tr>
    <th>รหัสจังหวัด</th>
    <th>ชื่อจังหวัด</th>
    <th>ภาค</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
</tr>
<?php
//while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
?>

<!--ใช้สำหรับ MYSQLI_ASSOC
<tr>
    <td><?php// echo $row['tree_id']; ?></td>
    <td><?php// echo $row['c_name']; ?></td>
    <td><?php// echo $row['s_name']; ?></td>
</tr>
-->
<!--ใช้สำหรับ MYSQLI_NUM-->
<tr>
    <td><?php echo $row['0']; ?></td>
    <td><?php echo $row['1']; ?></td>
    <td><?php echo $row['2']; ?></td>
    <td><a href="prov_update_form.php?prov_id=<?php echo $row[0];?>">แก้ไข</a></td>
    <td><a href="prov_delete.php?prov_id=<?php echo $row[0];?>"> ลบ</td>
</tr>
<?php
}

//4. ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
</table>