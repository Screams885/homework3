<?php
    require 'dbconnect.php';

    $c_name = $_POST['c_name'];
    $sql = "SELECT * FROM treedata WHERE c_name LIKE '%$c_name%'" ; 
    $result = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>ผลการสืบค้น</title>
    </head>
    <body>
    <div class="w3-container">
    <h2>ผลการสืบค้น</h2>
            <table class="w3-table-all">
                <tr>
                    <th>ชื่อสามัญ</th>
                    <th>ชื่อวิทยาศาสตร์</th>
                </tr>
            <?php
            if(mysqli_num_rows($result)<1){
            ?>
            <tr>
                <td><?php echo "ไม่พบข้อมูลที่ต้องการสืบค้น" ?></td>
                <td></td>
            <tr>
            <?php
            }else{
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['tree_id']; ?></td>
                    <td><a href="tree_data.php?tree_id=<?php echo $row['tree_id']; ?>"><?php echo $row['c_name']; ?></a></td>                        
                </tr>
                <?php
                }
                mysqli_free_result($result);
                mysqli_close($conn);
            }
            ?>
            </table>
    </body>
</html>