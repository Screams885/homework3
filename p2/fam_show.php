<?php 
require 'dbconnect.php';

$sql = "SELECT * FROM fam_data";
$result = mysqli_query($conn,$sql);

?>

<style>
table, th, td {
  border: 1px solid;
}
</style>

<table>
<tr>
    <th>รหัสวงศ์</th>
    <th>ชื่อวงศ์</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
</tr>
<?php 
while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
?>

<tr>
    <td><?php echo $row['0']; ?></td>
    <td><?php echo $row['1']; ?></td>
    <td><a href="fam_update_form.php?fam_id=<?php echo $row[0];?>">แก้ไข</a></td>
    <td><a href="fam_delete.php?fam_id=<?php echo $row[0];?>"> ลบ</td>
</tr>
<?php
}

mysqli_close($conn);
?>
</table>