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
//1. เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

//2. เรียกสืบค้น
$sql = "SELECT * FROM treedata INNER JOIN fam_data ON treedata.fam_id = fam_data.fam_id INNER JOIN prov_data ON treedata.prov_id = prov_data.prov_id";
$result = mysqli_query($conn,$sql);     //สั่งให้คำสั่ง SQL ในตัวแปร $sql ทำงาน

//3. การแสดงผล

?>
<head>

<link rel="stylesheet" href="style.css">
<?php

if ($conn) {
    // สร้างคำสั่ง SQL เพื่อดึงข้อมูล
    $sql = "SELECT * FROM treedata INNER JOIN fam_data ON treedata.fam_id = fam_data.fam_id INNER JOIN prov_data ON treedata.prov_id = prov_data.prov_id";
$result = mysqli_query($conn,$sql);

    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if (mysqli_num_rows($result) > 0) {
        // วนลูปเพื่อแสดงข้อมูลที่ดึงมา
        while ($row = mysqli_fetch_assoc($result)) {
            // แสดงข้อมูลใน HTML
            echo "<div class='item'>";
            echo "<img src='images/".$row['photo']."'>";
            echo "<div class='content'>";
            echo "<div class='author'>".$row['tree_id']."</div>";
            echo "<div class='title'>".$row['c_name']."</div>";
            echo "<div class='topic'>".$row['s_name']."</div>";
            echo "<div class='des'>".$row['ct']."</div>";
            echo "<div class='buttons'>";
            echo "<button><a href='".$row['tree_id']."' target='_blank'>SEE MORE</a></button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        // แสดงรายการ thumbnail
        echo '<div class="thumbnail">';
        mysqli_data_seek($result, 0); // ย้าย pointer กลับไปที่ตำแหน่งเริ่มต้นของผลลัพธ์
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='item'>";
            echo "<img src='images/".$row['photo']."'>";
            echo "<div class='content'>";
            echo "<div class='title'>".$row['c_name']."</div>";
            echo "<div class='description'>".$row['s_name']."</div>";
            echo "</div>";
            echo "</div>";
        }
        echo '</div>'; // ปิด div.thumbnail
    } else {
        echo "0 results";
    }

    // ปิดการเชื่อมต่อกับฐานข้อมูล
    mysqli_close($connection);
} else {
    echo "การเชื่อมต่อกับฐานข้อมูลล้มเหลว";
}
?>
<script src="app.js"></script>
</table>