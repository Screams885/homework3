<?php
    require 'dbconnect.php';

    $tree_id = $_GET['tree_id'];
    $sql = "SELECT * FROM treedata INNER JOIN fam_data ON treedata.fam_id = fam_data.fam_id INNER JOIN prov_data ON treedata.prov_id = prov_data.prov_id WHERE tree_id = $tree_id";
    $result = mysqli_query($conn,$sql);     //สั่งให้คำสั่ง SQL ในตัวแปร $sql ทำงาน
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC)
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>ข้อมูลต้นไม้ประจำจังหวัด</title>
    </head>
    <body>
    <div class="w3-container w3-center">
        <img src="images/<?php echo $row['photo']; ?>" width ="250px">
    </div>
    <p></p>        
    <div class="w3-container">
        <div class="w3-container w3-teal">          
            <h4>รายละเอียดข้อมูลต้นไม้ประจำจังหวัด</h4>
        </div>
        <table class="w3-table-all">
        <tr>
            <td>ไม้ประจำจังหวัด</td>
            <td><?php echo $row['prov_name'];?></td>                        
        </tr>   
        <tr>
            <td>ชื่อต้นไม้</td>
            <td><?php echo $row['c_name'];?></td>                        
        </tr>
        <tr>
            <td>ชื่อวิทยาศาสตร์</td>
            <td><?php echo $row['s_name'];?></td>                        
        </tr>        
        <tr>
            <td>วงศ์</td>
            <td><?php echo $row['fam_name'];?></td>                        
        </tr>
        <tr>
            <td>ชนิดใบ</td>
            <td><?php echo $row['leaf_type'];?></td>                        
        </tr> 
        <tr>
            <td>ลักษณะทั่วไป</td>
            <td><?php echo $row['ct'];?></td>                        
        </tr>
        <tr>
            <td>การขยายพันธุ์</td>
            <td><?php echo $row['propagation'];?></td>                        
        </tr>                                                
        <?php
            mysqli_free_result($result);
            mysqli_close($conn);
        ?>
        </table>
    </body>
</html>