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

</head>

<?php
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="">Home</a>
            <a href="https://www.youtube.com/watch?v=qguo-j5PxBE">Contacts</a>
            <a href="">Info</a>
        </nav>
    </header>

    
    <div class="carousel">
        
        <div class="list">
            <div class="item">
                <img src="images/<?php echo $row['photo']; ?>">
                <div class="content">
                    <div class="author"><?php echo $row['tree_id']; ?></div>
                    <div class="title"><?php echo $row['c_name']; ?></div>
                    <div class="topic"><?php echo $row['s_name']; ?></div>
                    <div class="des">
                    <?php echo $row['ct']; ?>
                    </div>
                    <div class="buttons">
                        <button><?php echo $row['tree_id']; ?></a></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="thumbnail">
            <div class="item">
                <img src="images/<?php echo $row['photo']; ?>">
                <div class="content">
                    <div class="title">
                    <?php echo $row['c_name']; ?>
                    </div>
                    <div class="description">
                    <?php echo $row['s_name']; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="arrows">
            <button id="prev">&#11164;</button>
            <button id="next">&#11166;</button>
        </div>

        <div class="time"></div>
    </div>

    <script src="app.js"></script>
</body>
</html>
<?php
}

//4. ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
