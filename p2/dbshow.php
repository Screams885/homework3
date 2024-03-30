<?php
//1. เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

//2. เรียกสืบค้น
$sql = "SELECT * FROM treedata INNER JOIN fam_data ON treedata.fam_id = fam_data.fam_id INNER JOIN prov_data ON treedata.prov_id = prov_data.prov_id";
$result = mysqli_query($conn,$sql);     //สั่งให้คำสั่ง SQL ในตัวแปร $sql ทำงาน

//3. การแสดงผล

?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>


          table {
            border-collapse: center;
            width: 100%;
            }

            th, td {
            text-align: center;
            padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
            background-color: #04AA6D;
            color: white;
            }

            td {
            text-align: center;
            padding: 8px;
            font-size: 10px; /* Adjust the font size here */
            }
    </style>
</head>

<a href ="db_insert_form.php">เพิ่มข้อมูล</a>

<table>
<tr>
    <th>รหัสต้นไม้</th>
    <th>ชื่อสามัญ</th>
    <th>ชื่อวิทยาศาสตร์</th>
    <th>วงศ์</th>
    <th>ชนิดใบ</th>
    <th>ลักษณะทั่วไป</th>
    <th>การขยายพันธุ์</th>
    <th>จังหวัด</th>
    <th>รูปภาพ</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
</tr>


<?php
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
<tr>
    <td><?php echo $row['tree_id']; ?></td>
    <td><?php echo $row['c_name']; ?></td>
    <td><?php echo $row['s_name']; ?></td>
    <td><?php echo $row['fam_name']; ?></td>
    <td><?php echo $row['leaf_type']; ?></td>
    <td><?php echo $row['ct']; ?></td>
    <td><?php echo $row['propagation']; ?></td> 
    <td><?php echo $row['prov_name']; ?></td>
     <!--แสดงภาพในตาราง -->
    <td><img src="images/<?php echo $row['photo']; ?>" width ="50px"></td>

    <td><a href="db_update_form.php?tree_id=<?php echo $row['tree_id'];?>"><i class="material-icons">attachment</i></a></td>
    <td><a href="db_delete.php?tree_id=<?php echo $row['tree_id'];?>">🗑️</i>
</tr>

<?php
}

//4. ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
</table>